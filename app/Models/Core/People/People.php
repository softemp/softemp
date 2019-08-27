<?php

namespace App\Models\Core\People;

use App\Models\Core\AccessControl\Role;
use App\Models\Core\Company\Company;
use App\Models\Core\Contact\ContEmail;
use App\Models\Core\Contact\ContPhone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;

    protected $table = 'people';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company(){
        return $this->hasOne(Company::class,'person_id','id');
    }

    /**
     * @param $company
     * @return Model
     */
    public function addCompany($company) {
        return $this->company()->create($company);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function physical(){
        return $this->hasOne(Physical::class,'person_id','id');
    }

    protected function getPhysicalCountAttribute($value)
    {
        return $value ?? $this->physical_count = $this->physical()->count();
    }

    /**
     * @param $physical
     * @return Model
     */
    public function addPhysical($physical) {
        return $this->physical()->create($physical);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'people_role','person_id','role_id')->withPivot(['id']);
    }

    /**
     * @param Role $role
     * @return Model
     */
    public function addRole(Role $role){
        return $this->roles()->save($role);
    }

    public function peopleType(){
        return $this->belongsTo(PeopleType::class,'people_type_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contPhones(){
        return $this->hasMany(ContPhone::class,'person_id','id');
    }

    public function contEmails(){
        return $this->hasMany(ContEmail::class,'person_id', 'id');
    }


}
