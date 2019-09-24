<?php

namespace App\Models\StockControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'technicals';
//    protected $guarded = [];
    protected $fillable = [
        'name', 'fone'
    ];

    use ValidateTrait;

    public function rulesStore (){
        return [
            'name'=>'required|unique:mysql_stockcontrol.technicals|min:3|max:255',
            'fone'=>'required|unique:mysql_stockcontrol.technicals|min:8|max:15',
        ];
    }

    public function rulesUpdate(){
        return [
            'name'=>'',
            'fone'=>'',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }
}
