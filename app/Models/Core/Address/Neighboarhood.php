<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Neighboarhood extends Model
{
    protected $table = 'neighboarhoods';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(190)
     *
     * @var array
     */
    protected $fillable = ['name','city_id'];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
