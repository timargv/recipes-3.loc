<?php

use Faker\Generator as Faker;

$factory->define(App\Measure::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->realText(10),
    ];
});
