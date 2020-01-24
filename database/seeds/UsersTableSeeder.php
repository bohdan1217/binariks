<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'a@a.ru',
                'password' => bcrypt(12345678),
            ],
            [
                'id' => 2,
                'name' => 'user',
                'email' => 'u@u.ru',
                'password' => bcrypt(12345678),
            ],
            [
                'id' => 3,
                'name' => 'bohdan',
                'email' => 'admin@admin.ru8',
                'password' => bcrypt(12345678),
            ],
            [
                'id' => 4,
                'name' => 'masha',
                'email' => 'admin@admin.ru9',
                'password' => bcrypt(12345678),
            ],
            [
                'id' => 5,
                'name' => 'pasha',
                'email' => 'admin@admin.ru10',
                'password' => bcrypt(12345678),
            ],
        ];
        DB::table('users')->insert($data);
    }

}
