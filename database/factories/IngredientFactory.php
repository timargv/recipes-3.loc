<?php

use Faker\Generator as Faker;

$factory->define(App\Ingredient::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->realText(10),
    ];
});
