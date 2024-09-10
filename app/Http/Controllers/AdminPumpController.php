<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminPumpController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);

        $pump = Pump::query();

        if ($search) {
            $pump->where('sap_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('tag_id', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
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
                ->orWhere('note', 'LIKE', "%{$search}%");
        }

        $pump = $pump->paginate($pageLength);
        $locations = Location::all();

        return view('pump', compact('pump','search','pageLength','locations'));
    }

    public function create()
    {
        $locations = Location::all(); // Mengambil semua lokasi
        return view('pump', compact('locations'));
    }

    public function edit($id)
    {
        $pump = Pump::with('location')->findOrFail($id); // Pastikan relasi 'location' ada
        $locations = Location::all(); // Mengambil semua lokasi
        return view('pump.edit', compact('pump', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sap_id' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'capacity' => 'nullable|numeric',
            'head' => 'nullable|numeric',
            'coupling' => 'nullable|string|max:255',
            'front_bearing' => 'nullable|string|max:255',
            'rear_bearing' => 'nullable|string|max:255',
            'impeler' => 'nullable|numeric',
            'oil' => 'nullable|string|max:255',
            'oil_seal' => 'nullable|string|max:255',
            'grease' => 'nullable|string|max:255',
            'mech_seal' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:1000',
        ]);

        $pump = Pump::create($validated);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = 'pump_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets/img/'), $file_name);
            $pump->img = $file_name;
            $pump->save();
        }

        return redirect()->route('pump.index')->with('success', 'Data created successfully.');
    }

    public function update(Request $request, Pump $pump)
    {
        $validated = $request->validate([
            'sap_id' => 'required|integer|unique:pumps,sap_id,' . $pump->id,
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'capacity' => 'nullable|numeric',
            'head' => 'nullable|numeric',
            'coupling' => 'nullable|string|max:255',
            'front_bearing' => 'nullable|string|max:255',
            'rear_bearing' => 'nullable|string|max:255',
            'impeler' => 'nullable|numeric',
            'oil' => 'nullable|string|max:255',
            'oil_seal' => 'nullable|string|max:255',
            'grease' => 'nullable|string|max:255',
            'mech_seal' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        $pump->update($validated);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = 'pump_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets/img/'), $file_name);
            $pump->img = $file_name;
            $pump->save();
        }

        return redirect()->route('pump.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        Pump::findOrFail($id)->delete();
        return redirect()->route('pump.index')->with('success', 'Data deleted successfully.');
    }


}