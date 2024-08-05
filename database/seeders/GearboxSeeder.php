<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gearbox;
use App\Models\Location;

class GearboxSeeder extends Seeder
{
    public function run()
    {
        $locationIds = Location::pluck('id');

        Gearbox::create([
            'sap_id' => 1,
            'name' => 'Gearbox Example 1',
            'tag_id' => 'TAG001',
            'location_id' => $locationIds->random(),
            'brand' => 'Brand C',
            'model' => 'Model Z',
            'capacity' => 500.0,
            'head' => 100.0,
            'coupling' => 'Coupling B',
            'front_bearing' => 'Bearing C',
            'rear_bearing' => 'Bearing D',
            'impeler' => 15.0,
            'oil' => 'Oil B',
            'oil_seal' => 'Seal B',
            'grease' => 'Grease B',
            'mech_seal' => 'Seal C',
            'note' => 'This is a test gearbox.',
        ]);

        // Tambah data lainnya jika diperlukan
    }
}