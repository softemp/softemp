<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\Network;

use App\Http\Controllers\Controller;
use App\Models\Provedor\MkAuth\Client;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected $pathView = 'softemp.panel.provedor.network.route';
    protected $groupRoute = 'softemp.panel.provedor.network.route';
    private $mkAuthClient;

    /**
     * RouteController constructor.
     * @param Request $request
     * @param Client $client
     */
    public function __construct(Request $request, Client $client)
    {
        $this->mkAuthClient = $client;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $clients = $this->mkAuthClient->getActive()->where('coordenadas','<=','-48')->pluck('nome','coordenadas');
        return view("$this->pathView.index", compact('clients'));
    }
}
