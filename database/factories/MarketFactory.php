<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Markets;
use App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Markets::class, function (Faker $faker) {
    return [
        'id_market' => $faker->uuid,
        'name' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'UF' => $faker->stateAbbr
    ];
});
