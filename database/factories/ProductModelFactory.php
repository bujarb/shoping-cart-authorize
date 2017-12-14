<?php

use Faker\Generator as Faker;
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(100,1000),
    ];
});
