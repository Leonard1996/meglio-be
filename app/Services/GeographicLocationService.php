<?php
namespace App\Services;

use App\Models\GeographicLocation;


class GeographicLocationService {

    public function getGeographicLocations()
    {
        return GeographicLocation::all();
    }

    public function getGeographicLocation(GeographicLocation $geographicLocation)
    {
        return $geographicLocation;
    }

}
