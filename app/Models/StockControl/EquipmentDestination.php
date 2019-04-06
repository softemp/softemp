<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;

class EquipmentDestination extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment_destinations';
    protected $guarded = [];

    public function rules (){
        return [
            'equipment_id' => '',
            'order_out_id'=>'',
            'destination'=>'',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }
}
