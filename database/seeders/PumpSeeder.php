<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PumpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pump = [
            [
                'sap_id' => '500015109',
                'name' => 'Crude Oil Pump A',
                'tag_id' => 'PU301A',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015111',
                'name' => 'Crude Oil Pump B',
                'tag_id' => 'PU301B',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015112',
                'name' => 'Crude Oil Dryer Discharge Pump A',
                'tag_id' => 'PU311A',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015114',
                'name' => 'Crude Oil Dryer Discharge Pump B',
                'tag_id' => 'PU311B',
                'location' => 'REF 1',

            ],
        ];
    }
}