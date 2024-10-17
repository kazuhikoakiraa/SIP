<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua lokasi
        $locations = Location::all();

        // Daftar warna gradient untuk digunakan secara acak
        $gradients = [
            'linear-gradient(135deg, #FFC857, #FFD369)',
            'linear-gradient(135deg, #FF6B6B, #FF8E72)',
            'linear-gradient(135deg, #6A0572, #A4508B)',
            'linear-gradient(135deg, #00A8CC, #00C4FF)',
            'linear-gradient(135deg, #B3FFAB, #12FFF7)',
            'linear-gradient(135deg, #F5AF19, #F12711)',
            'linear-gradient(135deg, #11998E, #38EF7D)',
            'linear-gradient(135deg, #FF9A9E, #FAD0C4)'
        ];

        // Hitung jumlah equipment dari ketiga tabel untuk setiap lokasi
        $locations = $locations->map(function ($location) use ($gradients) {
            $totalEquipment = $location->motors()->count() +
                              $location->pumps()->count() +
                              $location->gearboxes()->count();

            return [
                'name' => $location->name,
                'equipment_count' => $totalEquipment,
                'gradient' => $gradients[array_rand($gradients)] // Pilih warna acak
            ];
        });

        // Pass data ke view
        return view('dashboard', ['locations' => $locations]);
    }
}