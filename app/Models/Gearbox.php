<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gearbox extends Model
{
    use HasFactory;
    protected $table = 'gearbox';
    protected $fillable = [
        'sap_id',
        'name',
        'tag_id',
        'location',
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
}
