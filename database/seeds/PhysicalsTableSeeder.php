<?php

use Illuminate\Database\Seeder;
use App\Models\Base\User\Physical;
use App\Models\Base\Auth\User;

class PhysicalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Physical::class, 10)->create()->each(function ($physical) {
            $physical->user()->save(factory(User::class)->make());
        });
    }
}
