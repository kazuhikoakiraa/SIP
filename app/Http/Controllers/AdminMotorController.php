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

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|exists:locations,tag', // Validasi location_id
        ]);

        $motor = Motor::create([
            'sap_id' => $request->sap_id,
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'location' => $request->location, // Gunakan location_id
            'brand' => $request->brand,
            'model' => $request->model,
            'ampere' => $request->ampere,
            'power' => $request->power,
            'front_bearing' => $request->front_bearing,
            'rear_bearing' => $request->rear_bearing,
            'speed' => $request->speed,
            'note' => $request->note,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $motor->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $motor->img = $file_name;
            $motor->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('motor.index')->with('success', 'Data created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sap_id' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'tag_id' => 'required|string',
            'location' => 'required|string',
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'ampere' => 'nullable|numeric',
            'power' => 'nullable|numeric',
            'front_bearing' => 'nullable|string',
            'rear_bearing' => 'nullable|string',
            'speed' => 'nullable|numeric',
            'note' => 'nullable|string',
        ]);

        $motor = Motor::findOrFail($id);
        $motor->sap_id = $request->sap_id;
        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('assets/img'), $imageName);
            $motor->img = $imageName;
        }
        $motor->name = $request->name;
        $motor->tag_id = $request->tag_id;
        $motor->location = $request->location;
        $motor->brand = $request->brand;
        $motor->model = $request->model;
        $motor->ampere = $request->ampere;
        $motor->power = $request->power;
        $motor->front_bearing = $request->front_bearing;
        $motor->rear_bearing = $request->rear_bearing;
        $motor->speed = $request->speed;
        $motor->note = $request->note;
        $motor->save();

        return redirect()->route('motor.index')->with('success', 'Motor updated successfully.');
    }

    public function destroy($id)
    {
        Motor::findOrFail($id)->delete();
        return redirect()->route('motor.index')->with('success', 'Data deleted successfully.');
    }
}