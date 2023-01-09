<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleVersionSeeder extends Seeder
{
    use CSVSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header_row = [
            "id",
            "AM_code",
            "description",
            "full_description",
            "fuel_id",
            "year",
            "body_type_id",
            "category_id",
            "cubic_capacity",
            "last_registration",
            "sales_end_date",
            "first_registration",
            "sales_start_date",
            "month",
            "vehicle_model_id"
        ];
        $this->insert_from_csv_large_file('vehicle_versions', 'vehicle_versions', 100, $header_row);
    }
}
