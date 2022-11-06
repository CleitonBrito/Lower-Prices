<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'id_product' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->sentence(5),
    ];
});
