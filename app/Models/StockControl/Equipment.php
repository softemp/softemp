<?php

namespace App\Models\StockControl;

use function GuzzleHttp\describe_type;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Equipment extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment';
    protected $guarded = [];

    public function insert($request)
    {
        $validate = $this->validateMacNs($request);
        $verify = $this->verifyExist($validate->ns);

        if ($validate && $verify){
            return Equipment::create([
                'equipment_model_id'    =>  $validate->model_id,
                'mac'                   =>  $validate->mac,
                'ns'                    =>  $validate->ns,
                'purchase_date'         =>  $validate->purchase_date
            ]);
        }else{
            //
        }
    }

    public function showAll()
    {
        return Equipment::get();
    }

    public function showStock()
    {
        return Equipment::where('status', 1)->get();
    }

    public function showBeingUsed()
    {
        return Equipment::where('status', 3)->get();
    }

    public function showTrash()
    {
        return Equipment::where('status', 4)->get();
    }

    public function putStock($id)
    {
        return Equipment::find($id)->update([
            'status' => 1
        ]);
    }

    public function putTrash($id)
    {
        return Equipment::find($id)->update([
            'status' => 4
        ]);
    }

    public function equipmentModel()
    {
        return $this->belongsTo(EquipmentModel::class, 'equipment_model_id', 'id');
    }

    public function checkStatus($order)
    {
        $status = true;
        foreach ($order->equipments as $equipment){
            if ($equipment->equipment_status == 2){
                $status = false;
            }
        }
        return $status;
    }

    public function destinations()
    {
        return $this->hasMany(equipmentDestination::class, 'equipment_id', 'id');
    }

    public function lastDestination(Equipment $equipment)
    {
        return $equipment->destinations()->latest()->first();
    }

    public function verifyExist($ns)
    {
        $verify = Equipment::where('ns', $ns)->first();
        if ($verify){
            return true;
        }else{
            return false;
        }
    }

    public function validateMacNs($obj)
    {
        $obj->mac = strtoupper($obj->mac);
        $obj->mac = str_replace("O", "0", $obj->mac);
        $obj->mac = str_replace("-", "", $obj->mac);
        $obj->mac = str_replace("/", "", $obj->mac);
        $obj->mac = str_replace(":", "", $obj->mac);
        $obj->mac = str_replace(";", "", $obj->mac);
        $obj->mac = str_replace(".", "", $obj->mac);
        $obj->mac = str_replace(",", "", $obj->mac);
        $obj->ns = strtoupper($obj->ns);
        $obj->ns = str_replace("O", "0", $obj->ns);
        $obj->ns = str_replace("-", "", $obj->ns);
        $obj->ns = str_replace("/", "", $obj->ns);
        $obj->ns = str_replace(":", "", $obj->ns);
        $obj->ns = str_replace(";", "", $obj->ns);
        $obj->ns = str_replace(".", "", $obj->ns);
        $obj->ns = str_replace(",", "", $obj->ns);
        return $obj;
    }
}
