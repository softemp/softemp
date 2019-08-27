<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'streets';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(190)
     * @cep varchar(10)
     *
     * @var array
     */
    protected $fillable = ['name','zip_code','neighboarhood_id'];

    public function neighboarhoods(){
        return $this->belongsTo(Neighboarhood::class,'neighboarhood_id');
    }
}
