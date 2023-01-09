<?php
namespace App\Services;

use App\Models\VehicleBodyType;


class VehicleBodyTypeService {

    public function getVehicleBodyTypes()
    {
        return VehicleBodyType::all();
    }

    public function getVehicleBodyType(VehicleBodyType $vehicleBodyType)
    {
        return $vehicleBodyType;
    }

}
