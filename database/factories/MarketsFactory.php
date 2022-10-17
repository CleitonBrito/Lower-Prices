<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Market;
use Faker\Generator as Faker;

$factory->define(Market::class, function (Faker $faker) {
    return [
        'id_market' => $faker->uuid,
        'name' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'UF' => $faker->stateAbbr
    ];
});
