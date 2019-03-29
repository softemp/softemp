<?php

namespace App\Models\Base\AccessControl;

use App\Models\Base\Company\Company;
use App\Models\Base\Company\CompanyUser;
use App\Models\Base\User\Physical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * @return array
     */
    public function rules (){
        return [
            //'name'=>'required|min:3|unique:roles',
            'name'=>'required|min:3|unique:roles,name,[id]',
            'slug'=>'',
            'description'=>'',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function occupation(){
        return $this->hasOne(Occupation::class,'role_id','id');
    }

    /**
     * @param $occupation
     * @return Model
     */
    public function addOccupation($occupation) {
        return $this->occupation()->create($occupation);
    }

//    public function physicals(){
//        return $this->belongsToMany(Physical::class, 'physical_roles', 'role_id', 'physical_id');
//    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function company_users(){
        return $this->belongsToMany(CompanyUser::class, 'company_user_roles', 'role_id', 'company_user_id');
    }
}
