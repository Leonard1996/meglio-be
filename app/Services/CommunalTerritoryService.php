<?php
namespace App\Services;

use App\Models\CommunalTerritory;


class CommunalTerritoryService {

    public function getCommunalTerritories()
    {
        return CommunalTerritory::all();
    }

    public function getCommunalTerritory(CommunalTerritory $communalTerritory)
    {
        return $communalTerritory;
    }

}
