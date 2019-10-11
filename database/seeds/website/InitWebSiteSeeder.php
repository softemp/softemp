<?php

use Illuminate\Database\Seeder;

class InitWebSiteSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AboutTableSeeder::class);
    }
}
