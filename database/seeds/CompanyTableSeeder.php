<?php

use Illuminate\Database\Seeder;

use App\Models\Base\Company\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Company::create(['fantasy_name'=>'SoftEmp']);
//        Company::create(['fantasy_name'=>'Norte Server']);
//        Company::create(['fantasy_name'=>'Cachimbo']);
//        Company::create(['fantasy_name'=>'w2otech']);

        factory(Company::class, 5)->create();
    }
}
