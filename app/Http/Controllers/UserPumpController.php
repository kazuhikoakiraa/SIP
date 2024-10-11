<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use App\Models\Location;
use Illuminate\Http\Request;

class UserPumpController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);

        // Query dasar untuk mengambil data pump
        $pump = Pump::query();

        // Jika ada parameter pencarian
        if ($search) {
            $pump->where('sap_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('tag_id', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('capacity', 'LIKE', "%{$search}%")
                ->orWhere('head', 'LIKE', "%{$search}%")
                ->orWhere('coupling', 'LIKE', "%{$search}%")
                ->orWhere('front_bearing', 'LIKE', "%{$search}%")
                ->orWhere('rear_bearing', 'LIKE', "%{$search}%")
                ->orWhere('impeler', 'LIKE', "%{$search}%")
                ->orWhere('oil', 'LIKE', "%{$search}%")
                ->orWhere('oil_seal', 'LIKE', "%{$search}%")
                ->orWhere('grease', 'LIKE', "%{$search}%")
                ->orWhere('mech_seal', 'LIKE', "%{$search}%")
                ->orWhere('note', 'LIKE', "%{$search}%")
                // Pencarian pada kolom `name` di tabel `locations` menggunakan whereHas
                ->orWhereHas('location', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }

        // Mengambil data pump dengan pagination
        $pump = $pump->paginate($pageLength);

        // Mengambil semua lokasi
        $locations = Location::all();

        // Mengirimkan data ke view
        return view('user-pump', compact('pump','search','pageLength','locations'));
    }
}