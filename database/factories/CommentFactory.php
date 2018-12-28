<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [

            //
            'user_id'   => 1,
            'text'      => 'Bill "s place for a minute or two she walked up.',
            'reply_id'  => 2,
            'status'    => 'active'
    ];

});
