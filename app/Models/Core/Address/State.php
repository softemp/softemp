<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(190)
     * @initials varchar(5)
     *
     * @var array
     */
    protected $fillable = ['name', 'initials','country_id'];

    public function country(){
        return $this->belongsTo(Country::class,'country_id', 'id');
    }

    public function city(){
        return $this->hasMany(City::class,'state_id','id');
    }
}
