<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicLocation extends Model
{
    use HasFactory;

    protected $table = 'geographic_locations';

    protected $fillable = [
        'id',
        'type'
    ];

    public $timestamps = false;

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

}
