<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'id',
        'geographic_location_id',
        'name'
    ];

    public $timestamps = false;

    public function communalTerritories()
    {
        return $this->hasMany(CommunalTerritory::class);
    }

}
