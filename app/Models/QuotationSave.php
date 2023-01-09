<?php

namespace App\Models;

use App\Models\Quotation;
use App\Models\InsuranceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationSave extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id', 'quotation_id','user_id','saved_quotation_id','status','link_end_point','can_be_paid','total_price','full_request','full_response'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request()
    {
        return $this->belongsTo(InsuranceRequest::class);
    }

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
    public function quotation_guarantees()
    {
        return $this->hasMany(QuotationGuarantee::class);
    }
}
