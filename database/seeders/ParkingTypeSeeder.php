<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('parking_types')->insert(['name' => 'Box privato', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('parking_types')->insert(['name' => 'Garage', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('parking_types')->insert(['name' => 'In strada', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
