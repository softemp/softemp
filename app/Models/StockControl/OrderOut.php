<?php

namespace App\Models\StockControl;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderOut extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'order_outs';
    protected $guarded = [];

    public function technicals()
    {
        return $this->belongsTo(Technical::class, 'technical_id', 'id');
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'order_out_equipments', 'order_out_id', 'equipment_id');
    }

    public function addEquipments(Equipment $equipment)
    {
        return $this->equipments()->save($equipment);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function upStatus($id, $status)
    {
        return OrderOut::find($id)->update(['order_status' => $status]);
    }
}
