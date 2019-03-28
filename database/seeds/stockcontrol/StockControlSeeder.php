<?php

use Illuminate\Database\Seeder;

class StockControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TechnicalsTableSeeder::class);
        $this->call(EquipmentModelsTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(OrderOutsTableSeeder::class);
        $this->call(OrderOutEquipmentTableSeeder::class);
        $this->call(EquipmentDestinationsTableSeeder::class);
    }
}
