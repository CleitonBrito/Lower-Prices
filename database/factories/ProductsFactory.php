<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use App\Models\Markets;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'id_product' => $faker->uuid,
        'fk_market' => Markets::all()->random()->id_market,
        'name' => $faker->name,
        'description' => $faker->realText(10, 1),
        'price' => $faker->randomFloat(2, 0, 100)
    ];
});
