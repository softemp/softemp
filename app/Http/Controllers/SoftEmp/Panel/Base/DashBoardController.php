<?php

namespace App\Http\Controllers\SoftEmp\Panel\Base;

use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    protected $pathView = 'softemp.panel.dashboard';
    protected $groupRoute = 'softemp.panel.dashboard';

    public function index()
    {
        return view("{$this->pathView}.index");
    }
}

