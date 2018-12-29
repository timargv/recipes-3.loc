<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        //

        'user_id' => $faker->numberBetween(1, 2),
        'category_id' => $faker->numberBetween(1, 268),

        'title'   => $faker->text(50),
        'text'   => $faker->realText(150),

        'portion' => $faker->numberBetween(1, 3),
        'hour'    => $faker->numberBetween(1, 12),
        'minutes' => $faker->numberBetween(0, 60),

        'calorie'   => $faker->randomFloat(0, 0, 1000),
        'squirrels' => $faker->randomFloat(3, 0, 1000),
        'fats'      => $faker->randomFloat(3, 0, 1000),
        'carbohydrates' => $faker->randomFloat(3, 0, 1000),

        'status'    => $faker->randomElement(['active', 'disable']),
        'confirmed_recipe'    => $faker->randomElement(['yeas', 'no']),


    ];
});
