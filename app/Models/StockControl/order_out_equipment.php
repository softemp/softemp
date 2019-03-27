<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class order_out_equipment extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'order_out_equipment';
    protected $guarded = [];
}
