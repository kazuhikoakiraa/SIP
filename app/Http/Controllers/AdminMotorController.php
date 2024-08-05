<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminMotorController extends Controller
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

        return view('motor', compact('motor', 'search', 'pageLength', 'locations'));
    }

    public function create()
    {
        $locations = Location::all(); // Mengambil semua lokasi
        return view('motor', compact('locations'));
    }

    public function edit($id)
    {
        $motor = Motor::with('location')->findOrFail($id); // Pastikan relasi 'location' ada
        $locations = Location::all(); // Mengambil semua lokasi
        return view('motor.edit', compact('motor', 'locations'));
    }

    // Menyimpan motor baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'ampere' => 'nullable|numeric',
            'power' => 'nullable|numeric',
            'front_bearing' => 'nullable|string|max:255',
            'rear_bearing' => 'nullable|string|max:255',
            'speed' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        $motor = Motor::create([
            'sap_id' => $validated['sap_id'],
            'name' => $validated['name'],
            'tag_id' => $validated['tag_id'],
            'location_id' => $validated['location_id'],
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'ampere' => $validated['ampere'],
            'power' => $validated['power'],
            'front_bearing' => $validated['front_bearing'],
            'rear_bearing' => $validated['rear_bearing'],
            'speed' => $validated['speed'],
            'note' => $validated['note'],
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = 'motor_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets/img/'), $file_name);
            $motor->img = $file_name;
            $motor->save(); // Simpan nama file gambar
        }

        return redirect()->route('motor.index')->with('success', 'Data created successfully.');
    }

    // Memperbarui motor yang ada
    public function update(Request $request, Motor $motor)
    {
        $validated = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id,' . $motor->id,
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'ampere' => 'nullable|numeric',
            'power' => 'nullable|numeric',
            'front_bearing' => 'nullable|string|max:255',
            'rear_bearing' => 'nullable|string|max:255',
            'speed' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        $motor->update([
            'sap_id' => $validated['sap_id'],
            'name' => $validated['name'],
            'tag_id' => $validated['tag_id'],
            'location_id' => $validated['location_id'],
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'ampere' => $validated['ampere'],
            'power' => $validated['power'],
            'front_bearing' => $validated['front_bearing'],
            'rear_bearing' => $validated['rear_bearing'],
            'speed' => $validated['speed'],
            'note' => $validated['note'],
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = 'motor_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets/img/'), $file_name);
            $motor->img = $file_name;
            $motor->save(); // Simpan nama file gambar
        }

        return redirect()->route('motor.index')->with('success', 'Motor updated successfully.');
    }

    public function destroy($id)
    {
        Motor::findOrFail($id)->delete();
        return redirect()->route('motor.index')->with('success', 'Data deleted successfully.');
    }


}