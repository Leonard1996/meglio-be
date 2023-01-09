<?php
namespace App\Services;

use App\Models\VehicleMake;


class VehicleMakeService {

    public function getVehicleMakes()
    {
        return VehicleMake::all();
    }

    public function getVehicleMake(VehicleMake $vehicleMake)
    {
        return $vehicleMake;
    }

}
