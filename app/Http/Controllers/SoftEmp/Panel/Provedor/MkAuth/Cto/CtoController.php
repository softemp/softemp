<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\MkAuth\Cto;

use App\Http\Controllers\Controller;
use App\Models\Provedor\MkAuth\Client;

class CtoController extends Controller
{
    protected $pathView = 'softemp.panel.provedor.mkauth.cto';
    protected $groupRoute = 'softemp.panel.provedor.mkauth.cto';

    private $model;

    public function __construct(Client $client)
    {
        $this->model = $client->where('caixa_herm', '!=', 'null')
            ->where('cli_ativado', 's');
    }

    public function index()
    {
        $data = $this->model
            ->groupBy('caixa_herm')->orderBy('caixa_herm', 'asc')
            ->get();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function show($caixa_herm)
    {
        $data = $this->model->where('caixa_herm', $caixa_herm)
            ->get([
                'login',
                'caixa_herm',
                'onu_ont',
                'porta_splitter',
                'ip'
            ]);
        foreach ($data as $key => $user) {
            $ping = (exec("ping -c1 -w1 {$user->ip}") ? '<span class="btn btn-success btn-sm">conectado</span>' : '<span class="btn btn-danger btn-sm">desconectado</span>');
            $user['ping'] = $ping;
        }

        return response()->json($data);
    }
}
