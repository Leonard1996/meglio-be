<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsuranceContractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'gender',
        'fiscal_code',
        'phone',
        'email',
        'date_of_birth',
        'country_of_birth_code',
        'province_of_birth_code',
        'commune_of_birth_code',
        'born_abroad',
        'residence_province_code',
        'residence_commune_code',
        'postal_code',
        'address',
        'house_number',
        'civil_status_id',
        'education_level_id',
        'profession_id',
        'driving_license_year',
        'contractor_is_owner',
        'valid_driving_license',
        'km_in_one_year',
        'youngest_age',
        'vehicles_owned',
        'policy_effective_date',
        'other_drivers',
        'business_name',
        'vat_number',
        'company_type',
        'children_under_17'
    ];

    public function request()
    {
        return $this->belongsTo(InsuranceRequest::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getBirthPlaceAttribute()
    {
        return sprintf('%s (%s) - %s', $this->city_of_birth->name ?? '', $this->province_of_birth_code, $this->state_of_birth->name ?? '');
    }

    public function getResidencialPlaceAttribute()
    {
        return sprintf('%s %s, %s %s (%s)', $this->address, $this->house_number, $this->postal_code, $this->city_of_residence->name ?? '', $this->residence_province_code);
    }

    public function province()
    {
        return $this->hasOne(CommunalTerritory::class, 'car_plate_symbol', 'residence_province_code');
    }

    public function state_of_birth()
    {
        return $this->hasOne(State::class, 'state_code', 'country_of_birth_code');
    }

    public function city_of_birth()
    {
        return $this->hasOne(Commune::class, 'cadastral_code', 'commune_of_birth_code');
    }

    public function city_of_residence()
    {
        return $this->hasOne(Commune::class, 'cadastral_code', 'residence_commune_code');
    }

    /**
     * @return BelongsTo
     */
    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    /**
     * @return BelongsTo
     */
    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class, 'education_level_id', 'id');
    }
}
