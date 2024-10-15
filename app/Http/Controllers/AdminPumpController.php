<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        try {
            $validated = $request->validate([
                'sap_id' => 'required|integer|unique:pumps,sap_id',
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
            ], [
                'sap_id.required' => 'SAP ID harus diisi.',
                'sap_id.integer' => 'SAP ID harus berupa angka.',
                'sap_id.unique' => 'SAP ID yang anda inputkan salah atau sudah ada di dalam data, coba periksa kembali.',
                'img.image' => 'File yang dipilih harus berupa gambar.',
                'img.mimes' => 'Gambar harus berupa file dengan tipe: jpeg, png, jpg, gif, svg.',
                'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'tag_id.required' => 'Tag ID harus diisi.',
                'tag_id.string' => 'Tag ID harus berupa teks.',
                'tag_id.max' => 'Tag ID tidak boleh lebih dari 255 karakter.',
                'location_id.required' => 'Lokasi harus diisi.',
                'location_id.exists' => 'Lokasi yang dipilih tidak valid.',
                'brand.string' => 'Brand harus berupa teks.',
                'brand.max' => 'Brand tidak boleh lebih dari 255 karakter.',
                'model.string' => 'Model harus berupa teks.',
                'model.max' => 'Model tidak boleh lebih dari 255 karakter.',
                'capacity.numeric' => 'Capacity harus berupa angka.',
                'head.numeric' => 'Head harus berupa angka.',
                'coupling.string' => 'Coupling harus berupa teks.',
                'coupling.max' => 'Coupling tidak boleh lebih dari 255 karakter.',
                'front_bearing.string' => 'Front bearing harus berupa teks.',
                'front_bearing.max' => 'Front bearing tidak boleh lebih dari 255 karakter.',
                'rear_bearing.string' => 'Rear bearing harus berupa teks.',
                'rear_bearing.max' => 'Rear bearing tidak boleh lebih dari 255 karakter.',
                'impeler.numeric' => 'Impeler harus berupa angka.',
                'oil.string' => 'Oil harus berupa teks.',
                'oil.max' => 'Oil tidak boleh lebih dari 255 karakter.',
                'oil_seal.string' => 'Oil seal harus berupa teks.',
                'oil_seal.max' => 'Oil seal tidak boleh lebih dari 255 karakter.',
                'grease.string' => 'Grease harus berupa teks.',
                'grease.max' => 'Grease tidak boleh lebih dari 255 karakter.',
                'mech_seal.string' => 'Mechanical seal harus berupa teks.',
                'mech_seal.max' => 'Mechanical seal tidak boleh lebih dari 255 karakter.',
                'note.string' => 'Note harus berupa teks.',
                'note.max' => 'Note tidak boleh lebih dari 1000 karakter.',
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
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('error', 'There was an error with your input. Please check and try again.');
        }
    }

    public function update(Request $request, Pump $pump)
    {
        try {
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
            ], [
                'sap_id.required' => 'SAP ID harus diisi.',
                'sap_id.integer' => 'SAP ID harus berupa angka.',
                'sap_id.unique' => 'SAP ID yang anda inputkan salah atau sudah ada di dalam data, coba periksa kembali.',
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'tag_id.required' => 'Tag ID harus diisi.',
                'tag_id.string' => 'Tag ID harus berupa teks.',
                'tag_id.max' => 'Tag ID tidak boleh lebih dari 255 karakter.',
                'location_id.required' => 'Lokasi harus diisi.',
                'location_id.exists' => 'Lokasi yang dipilih tidak valid.',
                'brand.string' => 'Brand harus berupa teks.',
                'brand.max' => 'Brand tidak boleh lebih dari 255 karakter.',
                'model.string' => 'Model harus berupa teks.',
                'model.max' => 'Model tidak boleh lebih dari 255 karakter.',
                'capacity.numeric' => 'Capacity harus berupa angka.',
                'head.numeric' => 'Head harus berupa angka.',
                'coupling.string' => 'Coupling harus berupa teks.',
                'coupling.max' => 'Coupling tidak boleh lebih dari 255 karakter.',
                'front_bearing.string' => 'Front bearing harus berupa teks.',
                'front_bearing.max' => 'Front bearing tidak boleh lebih dari 255 karakter.',
                'rear_bearing.string' => 'Rear bearing harus berupa teks.',
                'rear_bearing.max' => 'Rear bearing tidak boleh lebih dari 255 karakter.',
                'impeler.numeric' => 'Impeler harus berupa angka.',
                'oil.string' => 'Oil harus berupa teks.',
                'oil.max' => 'Oil tidak boleh lebih dari 255 karakter.',
                'oil_seal.string' => 'Oil seal harus berupa teks.',
                'oil_seal.max' => 'Oil seal tidak boleh lebih dari 255 karakter.',
                'grease.string' => 'Grease harus berupa teks.',
                'grease.max' => 'Grease tidak boleh lebih dari 255 karakter.',
                'mech_seal.string' => 'Mechanical seal harus berupa teks.',
                'mech_seal.max' => 'Mechanical seal tidak boleh lebih dari 255 karakter.',
                'note.string' => 'Note harus berupa teks.',
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
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('error', 'There was an error with your input. Please check and try again.');
        }
    }

    public function destroy($id)
    {
        Pump::findOrFail($id)->delete();
        return redirect()->route('pump.index')->with('success', 'Data deleted successfully.');
    }
}