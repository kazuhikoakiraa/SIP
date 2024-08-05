<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gearbox extends Model
{
    use HasFactory;
    protected $table = 'gearbox';
    protected $fillable = [
        'sap_id',
        'name',
        'tag_id',
        'location_id',
        'brand',
        'model',
        'capacity',
        'head',
        'coupling',
        'front_bearing',
        'rear_bearing',
        'impeler',
        'oil',
        'oil_seal',
        'grease',
        'mech_seal',
        'note',
    ];

    // Relasi many-to-one dengan Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}