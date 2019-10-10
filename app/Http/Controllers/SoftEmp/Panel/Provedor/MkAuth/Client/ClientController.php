<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\MkAuth\Client;

use App\Http\Controllers\Controller;
use App\Models\Provedor\MkAuth\Client;

class ClientController extends Controller
{
    protected $pathView = 'softemp.panel.provedor.mkauth.client';
    protected $groupRoute = 'softemp.panel.provedor.mkauth.client';

    private $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function index()
    {
        $data = $this->model->paginate();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function show($id){
        $data = $this->model->find($id);
        return response()->json($data);
    }

    public function active(){
        $data = $this->model->getActive()->paginate();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function free(){
        $data = $this->model->getFree()->paginate();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function blocked(){
        $data = $this->model->getBlocked()->paginate();
        return view("{$this->pathView}.index", compact('data'));
    }

    public function disabled(){
        $data = $this->model->getDisabled()->paginate();
        return view("{$this->pathView}.index", compact('data'));
    }
}
