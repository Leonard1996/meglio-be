<?php
namespace App\Services;

use App\Models\MaritalStatus;


class MaritalStatusService {

    public function all()
    {
        return MaritalStatus::orderBy('name','asc')->get();
    }

    public function get(MaritalStatus $maritalStatus)
    {
        return $maritalStatus;
    }

}
