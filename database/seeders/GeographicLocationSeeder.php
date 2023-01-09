<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeographicLocation;
use Illuminate\Support\Facades\DB;

class GeographicLocationSeeder extends Seeder
{
    use CSVSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert_from_csv('geographic_locations', 'geographic_locations');
    }
}
