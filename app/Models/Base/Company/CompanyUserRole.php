<?php

namespace App\Models\Base\Company;

use App\Models\Base\AccessControl\Occupation;
use Illuminate\Database\Eloquent\Model;

class CompanyUserRole extends Model
{
    /**
     * @var string
     */
    protected $table = 'company_user_roles';

    /**
     * o campo guarded protege os campos de inserções. Ele impede que alguém insira dados em alguns campos da nossa tabela.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'update_at'];

    /**
     * @param $companyUser
     * @param $role
     * @return mixed
     */
    public static function getCompanyUserRole($companyUser, $role) {

        $resultCompanyUser = is_object($companyUser) ? $companyUser->id : $companyUser;
        $resultRole = is_object($role) ? $role->id : $role;

        return CompanyUserRole::whereCompany_user_id($resultCompanyUser)
            ->whereRole_id($resultRole)
            ->firstOrFail();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function occupations(){
        return $this->belongsToMany(Occupation::class,'company_user_role_occupations','company_user_role_id','occupation_id')->withTimestamps();
    }


}
