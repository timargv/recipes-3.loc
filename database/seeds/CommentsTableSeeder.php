<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('comments')->insert([
            [
                'recipe_id' => 1,
                'user_id'   => 1,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 2,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:45'
            ],
            [
                'recipe_id' => 1,
                'user_id'   => 2,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 1,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:46'
            ],
            [
                'recipe_id' => 2,
                'user_id'   => 1,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 2,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:45'
            ],
            [
                'recipe_id' => 2,
                'user_id'   => 2,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 1,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:46'
            ],
            [
                'recipe_id' => 3,
                'user_id'   => 1,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 2,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:45'
            ],
            [
                'recipe_id' => 3,
                'user_id'   => 2,
                'text'      => 'Bill "s place for a minute or two she walked up.',
                'reply_id'  => 1,
                'status'    => 'active',
                'created_at' => '2018-12-28 07:22:46'
            ]
        ]);



//        factory(\App\Comment::class, 50)->create();
    }
}
