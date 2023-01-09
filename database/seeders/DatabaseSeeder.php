<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GeographicLocationSeeder::class,
            StateSeeder::class,
            RegionSeeder::class,
            CommunalTerritorySeeder::class,
            CommuneSeeder::class,
            UserSeeder::class,
            CommunalTerritoryDetailSeeder::class,
            VehicleMakeSeeder::class,
            VehicleModelSeeder::class,
            VehicleCategorySeeder::class,
            VehicleFuelSeeder::class,
            VehicleBodyTypeSeeder::class,
            UserTypeSeeder::class,
            MaritalStatusSeeder::class,
            ParkingTypeSeeder::class,
            ProfessionSeeder::class,
            TheftProtectionTypeSeeder::class,
            QualificationSeeder::class,
            InsuranceCompanySeeder::class,
            DataPrivacySeeder::class,

            // this is very large
            VehicleVersionSeeder::class

        ]);
    }
}
