<?php
namespace App\Services;

use App\Models\VehicleUsage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class VehicleUsageService {

    public function all() : Collection
    {
        return VehicleUsage::all();
    }

    public function get(VehicleUsage $getVehicleUsage) : Model
    {
        return $getVehicleUsage;
    }

}
