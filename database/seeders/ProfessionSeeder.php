<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('professions')->insert(['name' => 'Impiegato', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('professions')->insert(['name' => 'Operaio', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('professions')->insert(['name' => 'Libero professionista', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('professions')->insert(['name' => 'Pensionato', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
