<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingType extends Model
{

    protected $fillable = [
        'name',
        'status'
    ];
}
