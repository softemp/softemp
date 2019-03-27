<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;

class equipmentDestination extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment_destinations';
    protected $guarded = [];
}
