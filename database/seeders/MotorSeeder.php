<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motor = [
            [
                'sap_id' => '500015108',
                'name' => 'Crude Oil Pump A',
                'tag_id' => 'PU301A',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015110',
                'name' => 'Crude Oil Pump B',
                'tag_id' => 'PU301B',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015113',
                'name' => 'Crude Oil Dryer Discharge Pump A',
                'tag_id' => 'PU311A',
                'location' => 'REF 1',

            ],
            [
                'sap_id' => '500015115',
                'name' => 'Crude Oil Dryer Discharge Pump B',
                'tag_id' => 'PU311B',
                'location' => 'REF 1',

            ],
        ];
    }
}