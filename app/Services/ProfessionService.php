<?php
namespace App\Services;

use App\Models\Profession;


class ProfessionService {

    public function all()
    {
        return Profession::orderBy('name','asc')->get();
    }

    public function get(Profession $profession)
    {
        return $profession;
    }

}
