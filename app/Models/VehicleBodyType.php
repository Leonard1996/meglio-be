<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBodyType extends Model
{
    use HasFactory;

    protected $table = 'vehicle_body_types';

    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = false;

    public function vehicleVersions()
    {
        return $this->hasMany(VehicleVersion::class);
    }

}
