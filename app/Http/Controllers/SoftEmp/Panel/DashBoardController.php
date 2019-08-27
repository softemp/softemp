<?php

namespace App\Http\Controllers\SoftEmp\Panel;

use App\Http\Controllers\Controller;
use App\Models\StockControl\Equipment;

class DashBoardController extends Controller
{
    protected $pathView = 'softemp.panel.dashboard';
    protected $groupRoute = 'softemp.panel.dashboard';

    //protected $redi

    public function index(Equipment $equipment)
    {
        $equipmentCount = count($equipment->showStock());
        return view("{$this->pathView}.index", compact('equipmentCount'));
    }
}
