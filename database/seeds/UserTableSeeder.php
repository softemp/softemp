<?php

use Illuminate\Database\Seeder;
use App\Models\Base\Company\Company;
use App\Models\Base\User\User;
use App\Models\Base\Auth\Authentication;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($user) {
            $user->authentication()->save(factory(Authentication::class)->make());
        });

        factory(User::class, 5)->create();
    }
}
