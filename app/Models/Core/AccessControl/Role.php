<?php

namespace App\Models\Core\AccessControl;

use App\Models\Core\People\People;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occupations(){
        return $this->hasMany(Occupation::class,'role_id','id');
    }

    /**
     * @param $request
     * @return Model
     */
    public function addOccupation($request){
        return $this->occupations()->create($request);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function people(){
        return $this->belongsToMany(People::class,'people_role','role_id','person_id')->withPivot(['id']);
    }
}
