<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\MkAuth;

use App\Http\Controllers\SoftEmp\CrudController;
use App\Models\Provedor\MkAuth\People\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends CrudController
{
    protected $nameView = 'softemp.panel.support';
    protected $route = 'panel.support';

    public function __construct(Client $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = $this->model->find(4);

        //echo "Cliente: {$client->nome}<br>";
        //dd($client);

//        $clients = $this->model->where([
//            //'isento'=>'nao',
//            'cli_ativado'=>'s',
//        ])->get();

        //$clients = $this->model->where('cli_ativado','s')->where('caixa_herm','!=', 'null');

        $clients = $this->model->where('cli_ativado','s')->where('caixa_herm','!=', 'null')->orderBy('caixa_herm','asc')->get();

        $ctos = $clients->groupBy('caixa_herm');

      // dd($ctos);
        echo "Numero de CTOs: {$ctos->count()} caixas<br>";
        foreach ($ctos as $key => $cto){

            echo "Numero da CTO: {$key}<br>";
            echo "Quantidade de clientes: {$cto->count()} no splliter<br>";
            //echo "Quantidade de clientes: {$cto->count()} no splliter<hr>";
            //dd($key);
            foreach ($cto as $client){
                echo "Login: {$client->login} - Porta Splliter: {$client->porta_splitter}<br>";
            }
            echo "<hr>";
            //dd($cto);
//            foreach ($caixaCto as $key){
//                echo "{$key}<br>";
//            }
//            if($caixaCto[1]) {
//                echo "Caixa: {$caixaCto[1]}<br>";
//            }
            //echo "Caixa: {$cto->caixa_herm}<br>";
            //dd($client);
        }

       // dd($clients);
//        foreach ($clients as $client){
//            $client->pgaviso = 'sim';
//            $client->pgcorte = 'sim';
//            $client->save();
//        }

    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
