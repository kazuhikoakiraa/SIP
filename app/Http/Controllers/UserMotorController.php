<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Location;
use Illuminate\Http\Request;

class UserMotorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);

        // Query dasar untuk mengambil data motor
        $motor = Motor::query();

        // Jika ada parameter pencarian
        if ($search) {
            // Tambahkan pencarian berdasarkan kolom di tabel `motors`
            $motor->where('sap_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('tag_id', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('ampere', 'LIKE', "%{$search}%")
                ->orWhere('power', 'LIKE', "%{$search}%")
                ->orWhere('front_bearing', 'LIKE', "%{$search}%")
                ->orWhere('rear_bearing', 'LIKE', "%{$search}%")
                ->orWhere('speed', 'LIKE', "%{$search}%")
                ->orWhere('note', 'LIKE', "%{$search}%")
                // Pencarian pada kolom `name` di tabel `locations` menggunakan whereHas
                ->orWhereHas('location', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }

        // Mengambil data motor dengan pagination
        $motor = $motor->paginate($pageLength);

        // Mengambil semua lokasi
        $locations = Location::all();

        // Mengirimkan data ke view
        return view('user-motor', compact('motor', 'search', 'pageLength', 'locations'));
    }
}