<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $table = 'motors';
    protected $fillable  = [
    'sap_id',
    'name',
    'tag_id',
    'location',
    'brand',
    'model',
    'ampere',
    'power',
    'front_bearing',
    'rear_bearing',
    'speed',
    'note'
];
}
