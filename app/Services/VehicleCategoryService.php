<?php
namespace App\Services;

use App\Models\VehicleCategory;


class VehicleCategoryService {

    public function getVehicleCategories()
    {
        return VehicleCategory::all();
    }

    public function getVehicleCategory(VehicleCategory $vehicleCategory)
    {
        return $vehicleCategory;
    }

}
