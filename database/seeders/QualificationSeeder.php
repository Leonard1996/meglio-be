<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert(['name' => 'Master', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('qualifications')->insert(['name' => 'Laurea', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('qualifications')->insert(['name' => 'Diploma', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('qualifications')->insert(['name' => 'Scuola media', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('qualifications')->insert(['name' => 'Licenza elementare', 'created_at' => date("Y-m-d H:i:s")]);

    }
}
