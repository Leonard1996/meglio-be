<?php
namespace App\Services;

use App\Models\TheftProtectionType;


class TheftProtectionService {

    public function all()
    {
        return TheftProtectionType::orderBy('name','asc')->get();
    }

    public function get(TheftProtectionType $theftProtection)
    {
        return $theftProtection;
    }

}
