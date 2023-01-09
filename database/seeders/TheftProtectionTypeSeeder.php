<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheftProtectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theft_protection_types')->insert(['name' => 'Nessun antifurto', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('theft_protection_types')->insert(['name' => 'Meccanico', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('theft_protection_types')->insert(['name' => 'Immobilizzatore', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('theft_protection_types')->insert(['name' => 'Satellitare', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
