<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10); // Default 10 items per page

        $locations = Location::query();

        if ($search) {
            $locations->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('tag', 'LIKE', "%{$search}%");
        }

        $locations = $locations->paginate($pageLength);

        return view('user-location', compact('locations', 'search', 'pageLength'));
    }
}