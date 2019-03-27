<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'technicals';
    protected $guarded = [];
}
