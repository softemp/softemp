<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\MkAuth\Client;

use App\Http\Controllers\Controller;
use App\Models\Provedor\MkAuth\Client;

class ClientController extends Controller
{
    protected $pathView = 'softemp.panel.mkauth.client';
    protected $groupRoute = 'softemp.panel.mkauth.client';

    private $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function index()
    {
        $data = $this->model->all();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function show($id){
        $data = $this->model->find($id);
        return response()->json($data);
    }

    public function active(){
        $data = $this->model->where('cli_ativado', 's')->get();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function blocked(){
        $data = $this->model
            ->where('cli_ativado', 's')
                ->where('bloqueado', 'sim')
            ->get();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function disabled(){
        $data = $this->model->where('cli_ativado', 'n')->get();
        return view("{$this->pathView}.index", compact('data'));
    }
}
