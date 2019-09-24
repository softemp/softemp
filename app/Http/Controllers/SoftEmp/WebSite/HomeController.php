<?php

namespace App\Http\Controllers\SoftEmp\WebSite;

use App\Http\Controllers\SoftEmp\Panel\Core\People\Physical\PhysicalController;
use App\Http\Controllers\SoftEmp\WebSite\CrudController;
//use App\Models\WebSite\Home\Banner;
use App\Models\Core\People\Physical;
use CoffeeCode\Optimizer\Optimizer;
use Illuminate\Http\Request;

class HomeController extends CrudController
{
    //protected $nameView = 'softemp.website.home';
    //protected $route = 'website.home';
    private $pathImg = 'storage/softemp/panel/uploads/home/banner/';
    protected $banner;

    protected $pathView = 'softemp.website.home';
    protected $groupRoute = 'softemp.website.home';

//    public function __construct(Banner $banner)
//    {
//        $this->banner = $banner;
//    }

    public function __construct(Physical $model, Request $request)
    {
        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
    }

    public function index()
    {
        $this->arrayData['opt'] = $this->optMeta
            ->optimize('Gbit Telecom','Provedor de Internet com firba optica, a melhor qualidade no serviço e atendimento que você merece','www.gbittelecom.com.br','')
            ->publisher('softemp.com.br','pauloepanel');
        return parent::index(); // TODO: Change the autogenerated stub
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //$opt = $this->opt->publisher('softemp.com.br','Paulo Roberto da Silva');
//        $opt = $this->opt->optimize('Gbit Telecom','Provedor de Internet','www.gbittelecom.com.br', '');
//
//        //dd($opt->render());
//        $pathImg = $this->pathImg;
////        $bannersHome = $this->banner->all();
//        $bannersHome = '';
//
//        return view("{$this->pathView}.index",compact('pathImg','bannersHome','opt'));
//    }
}
