<?php

namespace App\Http\Controllers\Softemp\Panel\StockControl;


use App\Models\StockControl\Equipment;
use App\Models\StockControl\OrderOut;
use App\Models\StockControl\Technical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderOutController extends Controller
{
    private $equipment;
    private $technical;

    public function __construct(OrderOut $orderOut, Equipment $equipment, Technical $technical)
    {
        $this->equipment = $equipment;
        $this->technical = $technical;

        $pathView = 'softemp.panel.';
        $groupRoute = 'panel.access.';

        parent::__construct($orderOut, $groupRoute, $pathView);
    }

    public function create()
    {
        $title = 'Ordem de saída';
        $technicals = $this->technical->all();
        $equipments = $this->equipment->where('equipment_status', 1)->get();

        return view('orderouts.register',compact('technicals', 'equipments', 'title'));
    }

    public function store(Request $request)
    {
        $technicalid['technical_id'] = $request->technical_id;
        $os = $this->orderOut->create($technicalid);
        foreach ($request->equipments_id as $equipmentid)
        {
            $os->equipments()->attach($equipmentid);
            $this->equipment->upStatus($equipmentid, 2);
        }

        return redirect()->route('home')->with('success', 'Registro criado com sucesso.');
    }

    public function show($id)
    {
        $order = $this->orderOut->find($id);
        $check = $this->equipment->checkStatus($order);
        return view('orderouts.show', compact('order', 'check'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->orderOut->upStatus($id, 2);
        return redirect()->route('home')->with('success', 'Ordem fechada com sucesso');
    }


    public function destroy($id)
    {
        //
    }

    public function openorders()
    {
        $os = $this->orderOut->where('order_status', 1)->get();
        return view('orderouts.openorders', compact('os'));
    }

    public function closedorders()
    {
        $os = $this->orderOut->where('order_status', 2)->get();
        return view('orderouts.closedorders', compact('os'));
    }

    public function showclosed($id)
    {
        $order = $this->orderOut->find($id);
        return view('orderouts.showclosed', compact('order'));
    }
}
