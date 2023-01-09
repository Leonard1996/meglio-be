<?php

namespace Database\Seeders;

use App\Models\CommunalTerritoryDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunalTerritoryDetailSeeder extends Seeder
{
    use CSVSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert_from_csv('communal_territories_details', 'communal_territories_details');
    }
}
