<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        // Data contoh untuk tabel locations
        $locations = [
            ['name' => 'Main Warehouse', 'tag' => 'WH_MAIN'],
            ['name' => 'Secondary Warehouse', 'tag' => 'WH_SEC'],
            ['name' => 'Maintenance Room', 'tag' => 'RM_MAINT'],
            ['name' => 'Office', 'tag' => 'OFFICE'],
        ];

        // Insert data ke tabel locations
        DB::table('locations')->insert($locations);
    }
}