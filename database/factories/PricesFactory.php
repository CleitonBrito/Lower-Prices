<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Markets;
use App\Models\Products;
use App\Models\Prices;
use Faker\Generator as Faker;

$factory->define(Prices::class, function (Faker $faker) {
    return [
        'id_prices' => $faker->uuid,
        'fk_market' => Markets::all()->random()->id_market,
        'fk_product' => Products::all()->random()->id_product,
        'price' => $faker->randomFloat(2, 0, 6)
    ];
});
