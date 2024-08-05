<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pump;
use App\Models\Location;

class PumpSeeder extends Seeder
{
    public function run()
    {
        $locationIds = Location::pluck('id');

        Pump::create([
            'sap_id' => 1,
            'name' => 'Pump Example 1',
            'tag_id' => 'TAG001',
            'location_id' => $locationIds->random(),
            'brand' => 'Brand A',
            'model' => 'Model X',
            'capacity' => 150.5,
            'head' => 75.0,
            'coupling' => 'Coupling A',
            'front_bearing' => 'Bearing A',
            'rear_bearing' => 'Bearing B',
            'impeler' => 10.0,
            'oil' => 'Oil A',
            'oil_seal' => 'Seal A',
            'grease' => 'Grease A',
            'mech_seal' => 'Seal B',
            'note' => 'This is a test pump.',
        ]);

        // Tambah data lainnya jika diperlukan
    }
}