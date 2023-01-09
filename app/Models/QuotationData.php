<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuotationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'quotation_company_id',
        'total_without_taxes',
        'total_taxes_amount',
        'amount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation_data_adriatic()
    {
        return $this->belongsTo(QuotationDataAdriatic::class,'quotation_company_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotation_data_prima()
    {
        return $this->belongsTo(QuotationDataPrima::class,'quotation_company_id','id');
    }

}
