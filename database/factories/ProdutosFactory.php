<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produtos;
use App\Models\Mercados;
use Faker\Generator as Faker;

$factory->define(Produtos::class, function (Faker $faker) {
    return [
        'id_produto' => $faker->uuid,
        'fk_mercado' => factory(Mercados::class)->create()->id_mercado,
        'name' => $faker->name,
        'description' => $faker->realText(100, 1),
        'price' => $faker->randomFloat(2, 0, 100)
    ];
});
