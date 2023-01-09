<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleFuelSeeder extends Seeder
{
    use CSVSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert_from_csv('vehicle_fuels', 'vehicle_fuels');
    }
}
