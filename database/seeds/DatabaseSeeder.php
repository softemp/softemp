<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccessControlTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BaseTableSeeder::class);

        $this->call(TechnicalsTableSeeder::class);
        $this->call(EquipmentModelsTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(OrderOutsTableSeeder::class);
        $this->call(OrderOutEquipmentTableSeeder::class);
        $this->call(EquipmentDestinationsTableSeeder::class);
    }
}
