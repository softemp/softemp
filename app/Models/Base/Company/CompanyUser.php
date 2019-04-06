<?php

namespace App\Models\Base\Company;

use App\Models\Base\AccessControl\Role;
use App\Models\Base\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

/**
 * Class CompanyUser
 * @package App\Models\Base\Company
 */
class CompanyUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'company_users';

    /**
     * o campo guarded protege os campos de inserções. Ele impede que alguém insira dados em alguns campos da nossa tabela.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'update_at'];

    /**
     * @param $company
     * @param $role
     * @return mixed
     */
    public static function getCompanyUser($company, $user) {

        $resultCompany = is_object($company) ? $company->id : $company;
        $resultUser = is_object($user) ? $user->id : $user;

        return CompanyUser::whereCompany_id($resultCompany)
            ->whereUser_id($resultUser)
            ->firstOrFail();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'company_user_roles','company_user_id','role_id')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
