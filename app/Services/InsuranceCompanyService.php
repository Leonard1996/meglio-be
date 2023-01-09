<?php
namespace App\Services;

use App\Models\InsuranceCompany;


class InsuranceCompanyService {

    public function all()
    {
        return InsuranceCompany::orderBy('name','asc')->get();
    }

    public function get(InsuranceCompany $insuranceCompany)
    {
        return $insuranceCompany;
    }

}
