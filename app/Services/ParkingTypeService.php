<?php
namespace App\Services;

use App\Models\ParkingType;


class ParkingTypeService {

    public function all()
    {
        return ParkingType::orderBy('name','asc')->get();
    }

    public function get(ParkingType $parkingType)
    {
        return $parkingType;
    }

}
