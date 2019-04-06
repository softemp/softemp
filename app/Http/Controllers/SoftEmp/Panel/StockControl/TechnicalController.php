<?php

namespace App\Http\Controllers\Softemp\Panel\StockControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\StockControl\Technical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicalController extends CrudController
{
    public function __construct(Technical $technical)
    {
        $pathView = 'softemp.panel.stockcontrol.technicals';
        $groupRoute = 'panel.stockcontrol.technical';

        parent::__construct($technical, $groupRoute, $pathView);
    }
}
