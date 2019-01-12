<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'role' => 'admin',
            'name' => 'timargv',
            'email' => 'tima.rgv@mail.ru',
            'first_name' => 'Тимур',
            'last_name' => 'Рагимханов',
            'email_verified_at' => now(),
            'password' => '$2y$10$d0A1VUw1MjQpMAfqZGGmOOtdH2vGVKImA1JesK1CUqFGfpMncrTfa',
            'remember_token' => str_random(10)
        ]);
        User::create([
            'role' => 'user',
            'name' => 'user1',
            'email' => 'bloodwoman121993@mail.ru',
            'first_name' => 'Вика',
            'last_name' => 'Рагимханова',
            'email_verified_at' => now(),
            'password' => '$2y$10$d0A1VUw1MjQpMAfqZGGmOOtdH2vGVKImA1JesK1CUqFGfpMncrTfa',
            'remember_token' => str_random(10)
        ]);



    }
}
