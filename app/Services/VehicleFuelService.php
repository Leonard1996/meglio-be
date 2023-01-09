<?php
namespace App\Services;

use App\Models\VehicleFuel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class VehicleFuelService {

    public function all() : Collection
    {
        return VehicleFuel::all();
    }

    public function get(VehicleFuel $vehicleFuel) : Model
    {
        return $vehicleFuel;
    }

}
