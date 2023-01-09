<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InsuranceRequestVehicle extends Model
{
    use HasFactory;

    protected $table = 'insurance_request_vehicles';

    protected $fillable = [
        'request_id',
        'vehicle_plate',
        'vehicle_brand_code',
        'vehicle_model_code',
        'vehicle_version_code',
        'vehicle_year',
        'vehicle_month',
        'vehicle_purchased_year',
        'theft_protection_code',
        'tow_hook',
        'is_modified',
        'parking',
        'usage',
        'other_power_supply'
    ];

    public function brand() : HasOne {
        return  $this->hasOne(VehicleMake::class, 'id', 'vehicle_brand_code');
    }

    public function model() : HasOne {
        return  $this->hasOne(VehicleModel::class, 'id', 'vehicle_model_code');
    }

    public function version() : HasOne {
        return  $this->hasOne(VehicleVersion::class, 'id', 'vehicle_version_code');
    }

    public function theft_protection() : HasOne {
        return  $this->hasOne(TheftProtectionType::class, 'id', 'theft_protection_code');
    }

    public function getFullModelAttribute() {
        return ucfirst(strtolower($this->brand->name)) . ' ' . $this->model->name . ' ' . $this->version->description;
    }
    public function getDateOfMatriculationAttribute() {
        return $this->vehicle_month . '/' . $this->vehicle_year;
    }

}
