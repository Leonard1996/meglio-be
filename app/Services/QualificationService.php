<?php
namespace App\Services;

use App\Models\Qualification;


class QualificationService {

    public function all()
    {
        return Qualification::orderBy('name','asc')->get();
    }

    public function get(Qualification $qualification)
    {
        return $qualification;
    }

}
