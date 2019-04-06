<?php

namespace App\Http\Controllers\SoftEmp\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class PageController extends Controller
{
    protected $route = 'panel.pages';
    protected $pathView = 'softemp.panel.pages';

    public function blank(){
        return view("{$this->pathView}.blank");
    }

    public function tabela(){
        return view("{$this->pathView}.data_tables");
    }

    public function select2(){
        return view("{$this->pathView}.select2");
    }

    public function icheck(){
        return view("{$this->pathView}.icheck");
    }
}
