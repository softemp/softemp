<?php

namespace App\Http\Controllers\Softemp\Panel\StockControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\StockControl\EquipmentModel;
use Illuminate\Http\Request;

class EquipmentModelController extends CrudController
{

    public function __construct(EquipmentModel $equipmentModel)
    {
        $pathView = 'softemp.panel.stockcontrol.equipment_model';
        $groupRoute = 'panel.stockcontrol.model';

        parent::__construct($equipmentModel, $groupRoute, $pathView);
    }
}
