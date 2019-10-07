<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Provedor\MkAuth\Client;
use App\Models\Provedor\MkBlock;
use Illuminate\Http\Request;

class MkBlockController extends CrudController
{
    private $pathImg = 'storage/softemp/panel/uploads/sobre/';

    protected $pathView = 'softemp.panel.provedor.mkblock';
    protected $groupRoute = 'softemp.panel.provedor.mkblock';
    private $mkAuthClient;

    public function __construct(MkBlock $model, Request $request, Client $client)
    {
        $this->mkAuthClient = $client;

        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
    }

    public function getMkBlock(){

    }

    public function sincLoginBlock(){
        $loginBlocks = $this->mkAuthClient->getBlocked();

        dd($loginBlocks);
    }
}
