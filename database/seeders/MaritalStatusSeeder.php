<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert(['name' => 'Single', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('marital_statuses')->insert(['name' => 'Sposato/a', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
