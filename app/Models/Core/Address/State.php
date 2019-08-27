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
    protected $fillable = ['name', 'initials','countrie_id'];

    public function countries(){
        return $this->belongsTo(Countrie::class,'countrie_id', 'id');
    }

    public function cities(){
        return $this->hasMany(City::class,'states_id','id');
    }
}
