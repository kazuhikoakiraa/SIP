<?php

namespace App\Http\Controllers;

use App\Models\Gearbox;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminGearboxController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);

        $gearbox = Gearbox::query();

        if ($search) {
            $gearbox->where('sap_id', 'LIKE', "%{$search}%")
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

        $gearbox = $gearbox->paginate($pageLength);
        $locations = Location::all();

        return view('gear', compact('gearbox','search','pageLength','locations'));
    }

    public function create()
    {
        $locations = Location::all(); // Mengambil semua lokasi
        return view('gear', compact('locations'));
    }

    public function edit($id)
    {
        $gearbox = Gearbox::with('location')->findOrFail($id); // Pastikan relasi 'location' ada
        $locations = Location::all(); // Mengambil semua lokasi
        return view('gear.edit', compact('gearbox', 'locations'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:gearbox,sap_id',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|exists:locations,tag',
        ]);

        $gearbox = Gearbox::create([
            'sap_id' => $request->sap_id,
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'location' => $request->location,
            'brand' => $request->brand,
            'model' => $request->model,
            'capacity' => $request->capacity,
            'head' => $request->head,
            'coupling' => $request->coupling,
            'front_bearing' => $request->front_bearing,
            'rear_bearing' => $request->rear_bearing,
            'impeler' => $request->impeler,
            'oil' => $request->oil,
            'oil_seal' => $request->oil_seal,
            'grease' => $request->grease,
            'mech_seal' => $request->mech_seal,
            'note' => $request->note,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $gearbox->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $gearbox->img = $file_name;
            $gearbox->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('gear.index')->with('success', 'Data created successfully.');
    }

    public function update(Request $request, $id)
    {
        $gearbox = Gearbox::findOrFail($id);
        $gearbox->sap_id = $request->sap_id;

        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:gearbox,sap_id',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
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
            'note' => 'nullable|string|max:255',
        ]);

        $gearbox->update([
            'sap_id' => $request->sap_id,
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'location' => $request->location,
            'brand' => $request->brand,
            'model' => $request->model,
            'capacity' => $request->capacity,
            'head' => $request->head,
            'coupling' => $request->coupling,
            'front_bearing' => $request->front_bearing,
            'rear_bearing' => $request->rear_bearing,
            'impeler' => $request->impeler,
            'oil' => $request->oil,
            'oil_seal' => $request->oil_seal,
            'grease' => $request->grease,
            'mech_seal' => $request->mech_seal,
            'note' => $request->note,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $gearbox->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $gearbox->img = $file_name;
            $gearbox->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('gear.index')->with('success', 'gearbox updated successfully.');
    }

    public function destroy($id)
    {
        Gearbox::findOrFail($id)->delete();
        return redirect()->route('gear.index')->with('success', 'Data deleted successfully.');
    }


}