<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motor extends Model
{
    use HasFactory;
    protected $table = 'motors';
    protected $fillable  = [
    'sap_id',
    'name',
    'tag_id',
    'location_id',
    'brand',
    'model',
    'ampere',
    'power',
    'front_bearing',
    'rear_bearing',
    'speed',
    'note'
];

    // Relasi many-to-one dengan Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }



}