<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $table = 'communes';

    protected $fillable = [
        'communal_territory_id',
        'progressive_id',
        'alphanumeric_id',
        'name',
        'italian_name',
        'other_name',
        'is_province',
        'numeric_id',
        'numeric_2010_2016_id',
        'numeric_2006_2009_id',
        'numeric_1995_2005_id',
        'cadastral_code',
        'cap'
    ];

    public $timestamps = false;

    public function communalTerritory()
    {
        return $this->belongsTo(CommunalTerritory::class);
    }


}
