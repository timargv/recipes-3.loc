<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        //

        'user_id' => $faker->numberBetween(1, 2),

        'title'   => $faker->text(50),

        'portion' => $faker->numberBetween(1, 3),
        'hour'    => $faker->numberBetween(1, 12),
        'minutes' => $faker->numberBetween(0, 60),

        'calorie'   => $faker->numberBetween(1, 900),
        'squirrels' => $faker->numberBetween(1, 900),
        'fats'      => $faker->numberBetween(1, 900),
        'carbohydrates' => $faker->numberBetween(1, 900),

        'status'    => $faker->randomElement(['active', 'disable']),
        'confirmed_recipe'    => $faker->randomElement(['yeas', 'no']),


    ];
});
