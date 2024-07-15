<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [

            [
                'name' => 'Moratua Putra',
                'username' => 'mora',
                'email' => 'moratuaputra@gmail.com',
                'jabatan' => 'Administrator',
                'password'=> Hash::make('password')

            ],

        ];

        User::query()->insert($user);
    }
}