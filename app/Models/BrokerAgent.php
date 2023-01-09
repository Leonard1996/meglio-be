<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BrokerAgent extends Model
{
    use HasFactory;

    public function broker_company() : HasOne
    {
        return $this->hasOne(BrokerCompany::class, 'id', 'broker_company_id');
    }
}
