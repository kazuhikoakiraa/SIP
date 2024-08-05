<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motor;
use App\Models\Location;

class MotorSeeder extends Seeder
{
    public function run()
    {
        $locations = Location::pluck('id'); // Ambil semua ID lokasi

        // Menambahkan data contoh
        Motor::create([
            'sap_id' => 1,
            'name' => 'Motor Example 1',
            'tag_id' => 'TAG001',
            'location_id' => $locations->random(), // Pilih lokasi acak
            'brand' => 'Brand A',
            'model' => 'Model X',
            'ampere' => 10.5,
            'power' => 100.0,
            'front_bearing' => 'Bearing A',
            'rear_bearing' => 'Bearing B',
            'speed' => '1500 RPM',
            'note' => 'Example motor',
        ]);

        Motor::create([
            'sap_id' => 2,
            'name' => 'Motor Example 2',
            'tag_id' => 'TAG002',
            'location_id' => $locations->random(), // Pilih lokasi acak
            'brand' => 'Brand B',
            'model' => 'Model Y',
            'ampere' => 8.5,
            'power' => 80.0,
            'front_bearing' => 'Bearing C',
            'rear_bearing' => 'Bearing D',
            'speed' => '1200 RPM',
            'note' => 'Another example motor',
        ]);
    }
}