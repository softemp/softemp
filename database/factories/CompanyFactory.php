<?php

use Faker\Generator as Faker;

use App\Models\Base\Company\Company;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'fantasy_name'=>$faker->company
    ];
});
