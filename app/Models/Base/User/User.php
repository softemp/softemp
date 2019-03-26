<?php

namespace App\Models\Base\User;

use App\Models\Base\Company\Company;
use App\Models\Base\Company\CompanyUser;
use App\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Auth\Authentication;
use Illuminate\Support\Facades\Auth;

class User extends Model
{
    //use CompanyTrait;
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope('companies', function (Builder $builder) {
//            $builder->with('companies');
//        });
//
//    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function companies(){
        return $this->belongsToMany(Company::class,'company_users','user_id','company_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function authentication(){
        return $this->hasOne(Authentication::class,'user_id','id');
    }

    /**
     * @param $auth
     * @return Model
     */
    public function addAuthentication($auth) {
        return $this->authentication()->create($auth);
    }

}
