<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InsuranceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_token',
        'product_id',
        'ip',
        'source',
        'user_id',
        'broker_company_id',
        'broker_agent_id'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function vehicle()
    {
        return $this->hasOne(InsuranceRequestVehicle::class, 'request_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent()
    {
        return  $this->belongsTo(BrokerAgent::class, 'broker_agent_id', 'id');
    }

    public function borker_company()
    {
        return $this->belongsTo(BrokerCompany::class, 'broker_company_id','id');
    }

    public function data_privacies()
    {
        return $this->belongsToMany(DataPrivacy::class)->withPivot('status');
    }

    public function quotation_saves()
    {
        return $this->hasMany(QuotationSave::class,'request_id','id');
    }

    public function quotations() : HasMany {
        return $this->hasMany(Quotation::class, 'request_id', 'id');
    }

    public function documents() : BelongsToMany {
        return $this->belongsToMany(Document::class, 'insurance_request_documents', 'request_id');
    }

    public function failed_quotations() : HasMany {
        return $this->hasMany(FailedQuotation::class, 'request_id', 'id');
    }

}
