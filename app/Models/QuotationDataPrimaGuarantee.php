<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDataPrimaGuarantee extends Model
{
    use HasFactory;

    protected $table = 'quotation_data_prima_guarantees';

    protected $fillable = [
        'quotation_data_prima_id',
        'slug',
        'name',
        'is_last_year_guarantee_mandatory',
        'default',
        'rca_related',
        'early_discount_expiration_date',
        'contentsquare_code',
        'default_discount_code',
        'limits_name',
        'limits_slug',
        'limits_limit1',
        'limits_limit2',
        'tooltip_slug',
        'tooltip_text',
        'details_slug',
        'details_text',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation_data_prima()
    {
        return $this->belongsTo(QuotationDataPrima::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotation_data_prima_guarantee_prices()
    {
        return $this->hasMany(QuotationDataPrimaGuaranteePrice::class);
    }
}
