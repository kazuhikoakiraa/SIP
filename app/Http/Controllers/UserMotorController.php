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

        $motor = Motor::query();

        if ($search) {
            $motor->where('sap_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('tag_id', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('ampere', 'LIKE', "%{$search}%")
                ->orWhere('power', 'LIKE', "%{$search}%")
                ->orWhere('front_bearing', 'LIKE', "%{$search}%")
                ->orWhere('rear_bearing', 'LIKE', "%{$search}%")
                ->orWhere('speed', 'LIKE', "%{$search}%")
                ->orWhere('note', 'LIKE', "%{$search}%");
        }

        $motor = $motor->paginate($pageLength);
        $locations = Location::all(); // Mengambil semua lokasi

        return view('user-motor', compact('motor', 'search', 'pageLength', 'locations'));
    }
}