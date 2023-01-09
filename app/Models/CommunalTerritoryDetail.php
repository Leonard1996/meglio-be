<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunalTerritoryDetail extends Model
{
    use HasFactory;

    protected $table = 'communal_territories_details';

    protected $fillable = [
        'communal_territory_id',
        'nuts1_2010_code',
        'nuts2_2010_code',
        'nuts3_2010_code',
        'nuts1_2021_code',
        'nuts2_2021_code',
        'nuts3_2021_code'
    ];

    public $timestamps = false;

    public function communalTerritory()
    {
        return $this->belongsTo(CommunalTerritory::class);
    }


}
