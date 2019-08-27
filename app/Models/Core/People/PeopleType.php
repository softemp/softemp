<?php

namespace App\Models\Core\People;

use Illuminate\Database\Eloquent\Model;

class PeopleType extends Model
{
    protected $table = 'people_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function people(){
        return $this->hasOne(People::class,'people_type_id','id');
    }

    /**
     * @param $people
     * @return Model
     */
    public function addPeople($people) {
        return $this->people()->create($people);
    }
}
