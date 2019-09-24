<?php

namespace App\Models\StockControl;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
class OrderOut extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'order_outs';
    protected $guarded = [];

    public function rules (){
        return [
            'technical_id' => '',
            'status' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }

    public function technicals()
    {
        return $this->belongsTo(Technical::class, 'technical_id', 'id');
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'order_out_equipment', 'order_out_id', 'equipment_id')->withPivot('oestatus', 'id');
    }

    public function orderEquipmentDestination()
    {
        return $this->belongsTo(EquipmentDestination::class, 'order_out_id', 'id');
    }

//    public function addEquipments(Equipment $equipment)
//    {
//        return $this->equipments()->save($equipment);
//    }

//    public function getCreatedAtAttribute($value)
//    {
//        return Carbon::parse($value)->format('d/m/Y');
//    }

//    public function upStatus($id, $status)
//    {
//        return OrderOut::find($id)->update(['order_status' => $status]);
//    }

    public function scopeCloseOrder(Builder $builder, $id)
    {
        return $builder->find($id)->update(['status' => 2]);
    }

    public function scopeOpenOrders(Builder $builder)
    {
        return $builder->where('status', 1)->get();
    }

    public function scopeClosedOrders(Builder $builder)
    {
        return $builder->where('status', 2)->get();
    }

    public function equipmentWithTechnical()
    {
        return $this->equipment()->where('status', 2)->get();
    }

    public function checkExpiration($created_at)
    {
        $created_at = date_format($created_at, 'm/d/Y');
        $expirationDate = date('d/m/Y', strtotime('+2days', strtotime(($created_at))));
        $today = date('d/m/Y');

        if ($today >= $expirationDate){
            return true;
        }

        return false;

    }

//    public function equipmentOrder()
//    {
//        return $this->belongsToMany(Equipment::class, 'order_out_equipment', 'order_out_id','equipment_id')->withPivot('oestatus');
//    }

}
