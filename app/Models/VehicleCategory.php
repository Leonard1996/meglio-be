<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    use HasFactory;

    protected $table = 'vehicle_categories';

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
