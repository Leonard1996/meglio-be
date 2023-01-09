<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDataPrimaGuaranteePrice extends Model
{
    use HasFactory;

    protected $table = 'quotation_data_prima_guarantee_prices';

    protected $fillable = [
        'quotation_data_prima_guarantee_id',
        'actual_limit',
        'ripara_prima',
        'deductible',
        'deductibles',
        'full',
        'discounted_to_display',
        'discounted',
        'discounted_monthly',
        'discounted_monthly_to_display',
        'discounted_without_taxes',
        'discounted_taxes',
        'discounted_ssn',
        'early_discount',
        'pressure_discount',
        'payment_frequency',
        'fee',
        'limit',
        'required_guarantees',

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation_data_prima_guarante()
    {
        return $this->belongsTo(QuotationDataPrimaGuarantee::class);
    }

}
