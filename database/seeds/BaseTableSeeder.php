<?php

use Illuminate\Database\Seeder;
use App\Models\Base\Company\Company;
use App\Models\Base\User\User;
use App\Models\Base\Company\CompanyUser;
use App\Models\Base\AccessControl\Role;
use App\Models\Base\Company\CompanyUserRole;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objCompany_1 = Company::create(['fantasy_name'=>'SoftEmp']);
            $objUser_1 = User::create(['name'=>'Paulo Roberto da Silva']);
            $objUser_1->addAuthentication(['user_name'=>'paulo','password'=>'12345678','status'=>'1']);
        $objCompany_1->users()->attach($objUser_1);

        $objCompanyUser_1 = CompanyUser::getCompanyUser($objCompany_1,$objUser_1);
            $objRole_1 =  Role::whereName('Root')->firstOrFail();
        $objCompanyUser_1->roles()->attach($objRole_1);//criando o relacionamento com a role


        //comapny Norte Server
        $objCompany_1 = Company::create(['fantasy_name'=>'Norte Server']);
        $objUser_1 = User::create(['name'=>'Willian W']);
        $objUser_1->addAuthentication(['user_name'=>'willian','password'=>'12345678','status'=>'1']);
        $objCompany_1->users()->attach($objUser_1);

        $objCompanyUser_1 = CompanyUser::getCompanyUser($objCompany_1,$objUser_1);
            $objRole_1 =  Role::whereName('Colaborador')->firstOrFail();
        $objCompanyUser_1->roles()->attach($objRole_1);//criando o relacionamento com a role

        $objCompanyUserRole_1 = CompanyUserRole::getCompanyUserRole($objCompanyUser_1,$objRole_1);
            $objOccupation_1 =  $objRole_1->occupation()->whereName('Gerente de Rede')->firstOrFail();
        $objCompanyUserRole_1->occupations()->attach($objOccupation_1->id);

        dd($objOccupation_1);

//
//
//        $physical_2 = User::create(['name'=>'Willian W']);
//        $physical_2->addUser(['user_name'=>'willian','password'=>'12345678']);
//        $physical_2->addCompany(Company::create(['fantasy_name'=>'Norte Server']));
//        $physical_2->addCompany(Company::create(['fantasy_name'=>'Swap Money']));
//
//        $physical_3 = User::create(['name'=>'Wilson Pereira']);
//        $physical_3->addUser(['user_name'=>'wilson','password'=>'12345678']);
//        $physical_3->addCompany(Company::create(['fantasy_name'=>'W2otech']));
//
//        $physical_4 = User::create(['name'=>'Lucas Pacheco']);
//        $physical_4->addUser(['user_name'=>'lucas','password'=>'12345678']);
//        $physical_4->addCompany(Company::create(['fantasy_name'=>'Cachimbo']));
    }
}
