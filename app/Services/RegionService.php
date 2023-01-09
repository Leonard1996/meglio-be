<?php
namespace App\Services;

use App\Models\Region;


class RegionService {

    public function getRegions()
    {
        return Region::all();
    }

    public function getRegion(Region $region)
    {
        return $region;
    }

}
