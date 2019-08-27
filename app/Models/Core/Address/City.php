<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(190)
     *
     * @var array
     */
    protected $fillable = ['name', 'state_id'];

    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
}
