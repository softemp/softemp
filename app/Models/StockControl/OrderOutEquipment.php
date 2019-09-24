<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;

class OrderOutEquipment extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $guarded = [];
    protected $table = 'order_out_equipment';
    protected $fillable = ['oestatus'];

    public function updateStatus($id)
    {
        return $this->find($id)->update(['oestatus' => 0]);
    }
}
