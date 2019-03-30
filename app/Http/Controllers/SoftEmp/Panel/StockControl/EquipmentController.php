<?php

namespace App\Http\Controllers\Softemp\Panel\StockControl;


use App\Models\StockControl\Equipment;
use App\Models\StockControl\equipmentDestination;
use App\Models\StockControl\EquipmentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\SoftEmp\Panel\CrudController;

class EquipmentController extends CrudController
{

    private $equipmentModel;
    private $destination;
    private $equipment;

    public function __construct(Equipment $equipment, equipmentDestination $equipmentDestination, EquipmentModel $equipmentModel)
    {
        $pathView = 'softemp.panel.stockcontrol.equipment.';
        $groupRoute = 'panel.stockcontrol.equipment';

        $this->equipment = $equipment;
        $this->equipmentModel = $equipmentModel;
        $this->destination = $equipmentDestination;

        parent::__construct($equipment, $groupRoute, $pathView);
    }

    public function create()
    {
        $data = $this->equipmentModel->all();

        return view($this->pathView.'create', compact('data'));
    }

    public function giveback(Request $request)
    {
        $this->equipment->upStatus($request->equipmentid, 1);

        return redirect()->route('orderouts.show', $request->orderid)->with('success', 'Equipamento devolvido');

    }

    public function equipDown(Request $request)
    {
        $this->equipment->upStatus($request->equipmentid, 3);

        $this->destination->create
        ([
            'equipmentId'   =>  $request->equipmentid,
            'orderOutId'    =>  $request->orderid,
            'destination'   =>  $request->destination
        ]);

        return redirect()->route('orderouts.show', $request->orderid)->with('success', 'Destinado');
    }

    public function inuse()
    {
        $equipments = $this->equipment->where('equipment_status', 3)->get();

        return view('equipments.inuse', compact('equipments'));
    }

    public function putStock($id)
    {
        $this->equipment->putStock($id);

        return redirect()->route($this->groupRoute.'.index')->with('success', 'Equipamento de volta ao estoque');

    }

    public function putTrash($id)
    {
        $this->equipment->putTrash($id);

        return redirect()->route($this->groupRoute.'.index')->with('success', 'Equipamento movido para o lixo');
    }

    public function showInTrash()
    {
        $equipments = $this->equipment->where('equipment_status', 4)->get();

        return view('equipments.intrash', compact('equipments'));
    }
}
