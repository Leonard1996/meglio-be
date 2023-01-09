<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationGuarantee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quotation_save_id',
        'guarantees_slug',
        'guarantees_description',
        'amount'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function saved_quotation()
    {
        return $this->belongsTo(QuotationSave::class);
    }
}
