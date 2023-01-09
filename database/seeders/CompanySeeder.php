<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::upsert([
            [
                'name' => 'adriatic',
                'status' => 1,
                'end_point' => 'https://apex-dev.adriatic-assicurazioni.it/neodb-dev/neo/rca/pricing',
                'end_point_type' => 'post',
                'password' => 'meglioquestio',
                'username' => 'meglioquestio1',
                'token' => null,
                'apikey' => null
            ],
            [
                'name' => 'prima',
                'status' => 1,
                'end_point' => 'https://meglioquestio-6dvcs-staging.prima.it/api',
                'end_point_type' => 'post',
                'password' => null,
                'username' => null,
                'token' => null,
                'apikey' => '7747c61_a731170ba0c50654971aeffe9f0037a2aaac85f9'
            ],
        ], ['name','status']);
    }
}
