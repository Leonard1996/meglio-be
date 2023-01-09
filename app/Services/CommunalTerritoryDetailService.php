<?php
namespace App\Services;

use App\Models\CommunalTerritoryDetail;


class CommunalTerritoryDetailService {

    public function getCommunalTerritoriesDetails()
    {
        return CommunalTerritoryDetail::all();
    }

    public function getCommunalTerritoryDetail(CommunalTerritoryDetail $communalTerritoryDetail)
    {
        return $communalTerritoryDetail;
    }

}
