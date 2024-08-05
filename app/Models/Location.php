<?php

namespace App\Models;

use App\Models\Pump;
use App\Models\Motor;
use App\Models\Gearbox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = [
        'name',
        'tag',
    ];

    // Relasi one-to-many dengan Motor, Pump, dan Gearbox
    public function motors()
    {
        return $this->hasMany(Motor::class);
    }

    public function pumps()
    {
        return $this->hasMany(Pump::class);
    }

    public function gearboxes()
    {
        return $this->hasMany(Gearbox::class);
    }
}