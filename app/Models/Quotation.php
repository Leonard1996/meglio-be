<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id', 'company_id', 'amount', 'full_request', 'full_response'
    ];


    /**
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullResponse(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullRequest(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quotation_data_adriatic()
    {
        return $this->hasOne(QuotationDataAdriatic::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quotation_data_prima()
    {
        return $this->hasOne(QuotationDataPrima::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotation_saves()
    {
        return $this->hasMany(QuotationSave::class);
    }
}
