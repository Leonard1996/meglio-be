<?php

namespace App\Models;

use Database\Seeders\CommunalTerritoryDetailSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunalTerritory extends Model
{
    use HasFactory;

    protected $table = 'communal_territories';

    protected $fillable = [
        'region_id',
        'province_id',
        'name',
        'type',
        'car_plate_symbol'
    ];

    public $timestamps = false;

    public function details()
    {
        return $this->hasMany(CommunalTerritoryDetailSeeder::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }


}
