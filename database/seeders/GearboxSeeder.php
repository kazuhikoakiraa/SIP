<?php

namespace Database\Seeders;

use App\Models\Gearbox;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GearboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gearbox = [
            [
                'sap_id' => '500019164',
                'name' => 'BLOWER PNEUMATIC CONVEYING SYSTEM',
                'tag_id' => 'EP631A',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500019165',
                'name' => 'BLOWER PNEUMATIC CONVEYING SYSTEM',
                'tag_id' => 'EP631B',
                'location' => 'REF 1',

            ],
        ];

        Gearbox::query()->insert($gearbox);
    }
}