<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use App\Models\Markets;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'id_product' => $faker->uuid,
        'fk_market' => factory(Markets::class)->create()->id_market,
        'name' => $faker->name,
        'description' => $faker->realText(100, 1),
        'price' => $faker->randomFloat(2, 0, 100)
    ];
});
