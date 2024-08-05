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

        // Hitung jumlah equipment dari ketiga tabel untuk setiap lokasi
        $locations = $locations->map(function($location) {
            $totalEquipment = $location->motors()->count() +
                              $location->pumps()->count() +
                              $location->gearboxes()->count();

            return [
                'name' => $location->name,
                'equipment_count' => $totalEquipment,
                'color' => $this->getColor($totalEquipment)
            ];
        });

        // Pass data ke view
        return view('dashboard', ['locations' => $locations]);
    }

    private function getColor($count)
    {
        // Menentukan warna berdasarkan jumlah equipment
        if ($count < 20) {
            return 'bg-red-400';
        } elseif ($count < 50) {
            return 'bg-blue-400';
        } elseif ($count < 100) {
            return 'bg-yellow-400';
        } else {
            return 'bg-green-400';
        }
    }
}