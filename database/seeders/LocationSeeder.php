<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            [
                'name' => 'REFINERY 1',
                'tag' => 'REF 1',
            ],
            [
                'name' => 'FRACTINATION 1',
                'tag' => 'FRA 1',
            ],
            [
                'name' => ''
            ],
        ];
    }
}