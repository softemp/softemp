<?php

use Illuminate\Database\Seeder;

class InitCoreSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BaseCoreTableSeeder::class);
    }
}
