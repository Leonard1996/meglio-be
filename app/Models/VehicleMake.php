<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'adriatic_model_id'
    ];

    public $timestamps = false;

    public function vehicleModels()
    {
        return $this->hasMany(VehicleModel::class);
    }

}
