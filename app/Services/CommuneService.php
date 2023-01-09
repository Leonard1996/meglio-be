<?php
namespace App\Services;

use App\Models\Commune;


class CommuneService {

    public function getCommunes()
    {
        return Commune::with('communalTerritory')->get();
    }

    public function getCommune(Commune $commune)
    {
        return $commune;
    }

}
