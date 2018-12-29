<?php

use Faker\Generator as Faker;

$factory->define(\App\Instruction::class, function (Faker $faker) {
    return [
        //
        'image' => 'https://s1.eda.ru/StaticContent/Photos/120131082850/120213184522/p_O.jpg',
        'recipe_id' => 1,
        'instrument_id' => 1,
        'instruction' => $faker->realText(50),
    ];
});
