<?php

namespace App\Models\Core\Contact;

use Illuminate\Database\Eloquent\Model;

class ContType extends Model
{
    protected $table = 'cont_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function rules(){
        return [
            'name'=>'required|unique:cont_types'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactEmail(){
        return $this->hasMany(ContEmail::class);
    }

    /**
     * @param $request
     * @return Model
     */
    public function addContactEmail($request){
        return $this->contactEmail()->create($request);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactPhone(){
        return $this->hasMany(ContPhone::class);
    }

    /**
     * @param $request
     * @return Model
     */
    public function addContactPhone($request){
        return $this->contactPhone()->create($request);
    }
}
