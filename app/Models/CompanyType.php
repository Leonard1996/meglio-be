<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{

    protected $fillable = [
        'name',
        'status'
    ];
}
