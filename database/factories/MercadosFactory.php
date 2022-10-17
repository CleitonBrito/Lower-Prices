<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mercados;
use Faker\Generator as Faker;

$factory->define(Mercados::class, function (Faker $faker) {
    return [
        'id_mercado' => $faker->uuid,
        'name' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'UF' => $faker->stateAbbr
    ];
});
