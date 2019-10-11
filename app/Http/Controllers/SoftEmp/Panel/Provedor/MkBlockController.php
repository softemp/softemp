<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor;

use App\Http\Controllers\Controller;
use App\Models\Provedor\MkAuth\Client;
use App\Models\Provedor\MkAuth\Radius\Nas;
use Illuminate\Http\Request;
use Mikrotik\Api\MikrotikAPI;

class MkBlockController extends Controller
{
    protected $pathView = 'softemp.panel.provedor.mkblock';
    protected $groupRoute = 'softemp.panel.provedor.mkblock';
    private $mkAuthClient;
    private $nas;
    private $arrayLog = [];
    private $resultMessage = ['message'];

    public function __construct(Request $request, Client $client, Nas $nas)
    {
        //parent::__construct($model, $request, $this->groupRoute, $this->pathView);

        $this->mkAuthClient = $client;
        $this->nas = $nas;
    }

    /**
     * metodo para reiniciar a conexão do cliente, o metodo remove o registro na aba active em ppp
     *
     * @param $login
     * @return \Illuminate\Http\JsonResponse
     */
    public function rebootClient($login)
    {
        // buscando o cliente pelo login
        $client = $this->getMkAuthClient($login);

        if(!$client){
            $this->resultMessage['message'] = ['error'=>'O cliente: '.$login.' não foi encontrado no MkAuth'];
            return response()->json($this->resultMessage);
        }

        // conenctando na RB pelo ramal do cliente no MkAuth
        $rbConn = $this->rbConnection($client->ramal);

        // verifica o status da conexão com os roteadores
        if($rbConn->statusConnect() === true) {

            $objAddressList = $rbConn->ppp()->active();

            // buscando o registro na RB
            $rbClient = $objAddressList->where('name', $client->login)[0];

            if (!$rbClient) {
                $this->resultMessage['message'] = ['warning'=>'O cliente: '.$client->login.' não esta conectado!'];
                return response()->json($this->resultMessage);
            }

            $result = $objAddressList->delete($rbClient['.id']);

            if($result === true ) {

                $this->setLog('deconectado - ' . $client->login . ' IP: ' . $client->ip);

                $this->resultMessage['message'] = ['success'=>'A conexão do cliente ' . $client->login . ' foi reiniciada'];

                return response()->json($this->resultMessage);
            }
            $this->setLog(' - erro: ' . $result.': '.$client->ramal);

            $this->resultMessage['message'] = ['error'=>$result.': '.$client->ramal];
            return response()->json($this->resultMessage);
        }

        $this->setLog(' - erro: ' . $rbConn.': '.$client->ramal);

        $this->resultMessage['message'] = ['error'=>$rbConn.': '.$client->ramal];
        return response()->json($this->resultMessage);
    }

    /**
     * metodo para bloquear o cliente pelo login
     *
     * @param $login
     * @return \Illuminate\Http\JsonResponse
     */
    public function blockClient($login)
    {
        // buscando o cliente pelo login
        $client = $this->getMkAuthClient($login);

        if(!$client){
            $this->resultMessage['message'] = ['error'=>'O cliente: '.$login.' não foi encontrado no MkAuth'];
            return response()->json($this->resultMessage);
        }

        // conenctando na RB pelo ramal do cliente no MkAuth
        $rbConn = $this->rbConnection($client->ramal);

        // verifica o status da conexão com os roteadores
        if($rbConn->statusConnect() === true) {

            $objAddressList = $rbConn->ip()->firewall()->addressList();

            // buscando o registro na RB
            $rbClient = $objAddressList->where('comment','ssh_corte_' . $client->login);

            if ($rbClient) {
                $this->resultMessage['message'] = ['warning'=>'O cliente: '.$client->login.' ja esta bloqueado!'];
                return response()->json($this->resultMessage);
            }

            $params = [
                   'list' => 'pgcorte',
                    'address' => $client->ip,
                    'comment' => 'ssh_corte_' . $client->login
            ];
            $result = $objAddressList->add($params);

            if($result === true ) {

                $this->setLog('adicionando bloqueio - ' . $client->login . ' IP: ' . $client->ip);

                $this->resultMessage['message'] = ['success'=>'Cliente ' . $client->login . ' bloqueado com sucesso'];

                return response()->json($this->resultMessage);
            }
            $this->setLog(' - erro: ' . $result.': '.$client->ramal);

            $this->resultMessage['message'] = ['error'=>$result.': '.$client->ramal];
            return response()->json($this->resultMessage);
        }

        $this->setLog(' - erro: ' . $rbConn.': '.$client->ramal);

        $this->resultMessage['message'] = ['error'=>$rbConn.': '.$client->ramal];
        return response()->json($this->resultMessage);
    }

    /**
     * metodo para liberar o cliente pelo login
     *
     * @param $login
     * @return \Illuminate\Http\JsonResponse
     */
    public function unlockClient($login)
    {
        // buscando o cliente pelo login
        $client = $this->getMkAuthClient($login);

        if(!$client){
            $this->resultMessage['message'] = ['error'=>'O cliente: '.$login.' não foi encontrado no MkAuth'];
            return response()->json($this->resultMessage);
        }

        // conenctando na RB pelo ramal do cliente no MkAuth
        $rbConn = $this->rbConnection($client->ramal);

        // verifica o status da conexão com os roteadores
        if($rbConn->statusConnect() === true) {

            $objAddressList = $rbConn->ip()->firewall()->addressList();

            // buscando o registro na RB
            $rbClient = $objAddressList->where('comment','ssh_corte_' . $client['login'])[0];

            if ($rbClient) {

                $objAddressList->delete($rbClient['.id']);

                $this->setLog('removendo o bloqueio - ' . $rbClient['comment'] . ' IP: ' . $rbClient['address']);

                $this->resultMessage['message'] = ['success'=>'Cliente ' . $client->login . ' liberado com sucesso'];

                return response()->json($this->resultMessage);
            }
            $this->resultMessage['message'] = ['warning'=>'O cliente: '.$client->login.' ja esta liberado!'];
            return response()->json($this->resultMessage);
        }

        $this->setLog(' - erro: ' . $rbConn.': '.$client->ramal);

        $this->resultMessage['message'] = ['error'=>$rbConn.': '.$client->ramal];
        return response()->json($this->resultMessage);
    }

    /**
     * modulo para sincronizar os clientes bloqueados nas RBs com o MkAuth
     */
    public function sincLoginBlock()
    {
        $arrayMKAuthBloqueados = [];
        $arrayRbBloqueados = [];

        foreach ($this->nas->getNas() as $rb) {
            //$this->arrayLog[] = date('Y-m-d H:i:s').' - entrando na RB - '.$rb->nasname;//adicionando ao log
            $this->setLog('Acessando '.$rb->shortname.' - IP - '.$rb->nasname);

            // buscando os cliente bloqueados no MkAuth
            $mkAuthBloqueados = $this->getMkAuthBloquedos($rb->nasname);

            // conenctando na RB pelo IP cadastrado no menu servidores no MkAuth
            $rbConn = $this->rbConnection($rb->nasname);

            // verifica o status da conexão com os roteadores
            if($rbConn->statusConnect() === true){

                $objAddressList = $rbConn->ip()->firewall()->addressList();

                $rbBloqueados = $this->getRbBloqueados($objAddressList);

                if($rbBloqueados) {
                    $this->deleteAddressList($objAddressList, $rbBloqueados);
                }

                if(!count($mkAuthBloqueados) == 0){
                    $this->addBloqueioAddressList($objAddressList,$mkAuthBloqueados);
                }

                $arrayRbBloqueados[$rb->nasname] = $rbBloqueados;

            } else {
                $result = date('Y-m-d H:i:s').'-'.$rbConn->statusConnect() .' ao Nas: '.$rb->shortname.' no IP: '.$rb->nasname;
                $arrayRbBloqueados[$rb->nasname] = $result;

                $this->arrayLog[] = $result;
            }

            $arrayMKAuthBloqueados[$rb->nasname] = $mkAuthBloqueados;
        }
        dd($arrayMKAuthBloqueados, $arrayRbBloqueados);
    }

    /**
     * @param $host
     * @return MikrotikAPI
     */
    private function rbConnection($host)
    {
        $rb_login = 'floripaserver';
        $rb_password = 'j5/t30/p';

        return new MikrotikAPI($host, $rb_login, $rb_password);
    }

    private function getMkAuthClient($login)
    {
        return $this->mkAuthClient->select(['nome', 'login', 'ip', 'ramal'])->where('login', $login)->first();
    }

    /**
     * buscando os clientes bloqueados no MkAuth
     *
     * @param $ramal
     * @return array
     */
    private function getMkAuthBloquedos($ramal)
    {
        $query = $this->mkAuthClient->newModelQuery();
        $query->select(['nome', 'login', 'ip', 'ramal']);
        $query->where('cli_ativado', 's');
        $query->whereBloqueado('sim');
        $query->where('ramal', $ramal);
        return $query->get()->toArray();
    }

    /**
     * retorna os logins bloqueados pelo MkAuth nas RBs
     *
     * @param $objAddressList
     * @return mixed
     */
    private function getRbBloqueados($objAddressList)
    {
        $bloqueados = $objAddressList->where('list', 'pgcorte');

        return $bloqueados;
    }

    /**
     * @param $objAddressList
     * @param $bloqueados
     */
    private function deleteAddressList($objAddressList, $bloqueados){
//        if($bloqueados) {
            foreach ($bloqueados as $bloqueado) {
                if (is_array($bloqueado)) {
                    $objAddressList->delete($bloqueado['.id']);
//                $this->arrayLog[] = date('Y-m-d H:i:s').' - removendo o bloqueio - '.$bloqueado['comment'].' IP: '.$bloqueado['address'];//adicionando ao log
                    $this->setLog('removendo o bloqueio - ' . $bloqueado['comment'] . ' IP: ' . $bloqueado['address']);
                }
            }
//        }
    }

    /**
     * @param $objAddressList
     * @param $mkAuthBloqueados
     */
    private function addBloqueioAddressList($objAddressList, $mkAuthBloqueados){
        foreach ($mkAuthBloqueados as $mkAuthBloqueado) {
//            if (is_array($mkAuthBloqueado)) {
                $params = [
                    'list' => 'pgcorte',
                    'address' => $mkAuthBloqueado['ip'],
                    'comment' => 'ssh_corte_' . $mkAuthBloqueado['login']
                ];
                $objAddressList->add($params);
//                $this->arrayLog[] = date('Y-m-d H:i:s').' - adicionando bloqueio - '.$mkAuthBloqueado['login'].' IP: '.$mkAuthBloqueado['ip'];//adicionando ao log
                $this->setLog('adicionando bloqueio - '.$mkAuthBloqueado['login'].' IP: '.$mkAuthBloqueado['ip']);
//            }
        }
    }

    /**
     * metodo para adicioanr registros ao log
     *
     * @param $params
     */
    private function setLog($params){
        if(is_array($params)){
            foreach ($params as $param){
                exec("echo $param >> log-mkblock.log");//adicionando ao log
            }
        }else {
            $log = date('Y-m-d H:i:s').' - '.$params;//adicionando ao log
            exec("echo $log >> log-mkblock.log");
        }
    }
}
