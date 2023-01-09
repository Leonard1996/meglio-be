<?php

namespace Database\Seeders;

use App\Models\CommunalTerritory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunalTerritorySeeder extends Seeder
{
    use CSVSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert_from_csv('communal_territories', 'communal_territories');
    }
}
