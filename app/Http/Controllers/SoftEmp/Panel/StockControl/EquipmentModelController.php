<?php

namespace App\Http\Controllers\Softemp\Panel\StockControl;

use App\Models\StockControl\EquipmentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Softemp\Panel\CrudController;

class EquipmentModelController extends CrudController
{

    public function __construct(EquipmentModel $equipmentModel)
    {
        $this->model = $equipmentModel;
        $this->pathView = 'softemp.panel.stockcontrol.equipment.models.';
    }
}
