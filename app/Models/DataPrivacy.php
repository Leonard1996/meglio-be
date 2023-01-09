<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPrivacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'content','status','order_number','type'
    ];

    /**
     * Get the insure requests for the blog recipe.
     */
    public function insurance_requests()
    {
        return $this->belongsToMany(InsuranceRequest::class)->withPivot('status');
    }

}
