<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'vehicle_make_id'
    ];

    public $timestamps = false;

    public function vehicleMake()
    {
        return $this->belongsTo(VehicleMake::class);
    }

    public function vehicleVersions()
    {
        return $this->hasMany(VehicleVersion::class);
    }

}
