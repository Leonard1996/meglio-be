<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDataPrima extends Model
{
    use HasFactory;

    protected $table = 'quotation_data_prima';

    protected $fillable = [
        'quotation_id',
        'quotation_prima_id',
        'data_fine_sconto_anticipo',
        'ripara_prima',
        'issuing_company',
        'can_be_saved',
        'has_early_discount',
        'has_pressure_discount',
        'early_discount_expiration_date',
        'early_discount_expiration_date_utc',
        'pressure_discount_expiration_date',
        'pressure_discount_expiration_date_utc',
        'monthly_coverages_schedule',
        'payment_frequencies',
    ];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
   /* protected function limits(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }*/

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
   /* protected function deductibles(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotation_data_prima_guarantees()
    {
        return $this->hasMany(QuotationDataPrimaGuarantee::class);
    }

}
