<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'name' => 'Bledi Deda',
                'email' => 'deda.bledi@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 1,
            ],
            [
                'name' => 'Roberto Cemeri',
                'email' => 'robertocemeri29@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 1,
            ],
            [
                'name' => 'Damiano Shehaj',
                'email' => 'damiano@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 1,
            ],
            [
                'name' => 'Andrea',
                'email' => 'andrea@meglioquestio.com',
                'password' => Hash::make('123456'),
                'user_type' => 1,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
