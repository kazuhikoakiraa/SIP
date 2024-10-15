<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        try {
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
                'ampere.numeric' => 'Ampere harus berupa angka.',
                'power.numeric' => 'Power harus berupa angka.',
                'front_bearing.string' => 'Front bearing harus berupa teks.',
                'front_bearing.max' => 'Front bearing tidak boleh lebih dari 255 karakter.',
                'rear_bearing.string' => 'Rear bearing harus berupa teks.',
                'rear_bearing.max' => 'Rear bearing tidak boleh lebih dari 255 karakter.',
                'speed.string' => 'Speed harus berupa teks.',
                'speed.max' => 'Speed tidak boleh lebih dari 255 karakter.',
                'note.string' => 'Note harus berupa teks.',
            ]);

            $motor = Motor::create($validated);

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $file_name = 'motor_' . time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('assets/img/'), $file_name);
                $motor->img = $file_name;
                $motor->save(); // Simpan nama file gambar
            }

            return redirect()->route('motor.index')->with('success', 'Data created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    // Memperbarui motor yang ada
    public function update(Request $request, Motor $motor)
    {
        try {
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
                'ampere.numeric' => 'Ampere harus berupa angka.',
                'power.numeric' => 'Power harus berupa angka.',
                'front_bearing.string' => 'Front bearing harus berupa teks.',
                'front_bearing.max' => 'Front bearing tidak boleh lebih dari 255 karakter.',
                'rear_bearing.string' => 'Rear bearing harus berupa teks.',
                'rear_bearing.max' => 'Rear bearing tidak boleh lebih dari 255 karakter.',
                'speed.string' => 'Speed harus berupa teks.',
                'speed.max' => 'Speed tidak boleh lebih dari 255 karakter.',
                'note.string' => 'Note harus berupa teks.',
            ]);

            $motor->update($validated);

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $file_name = 'motor_' . time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('assets/img/'), $file_name);
                $motor->img = $file_name;
                $motor->save(); // Simpan nama file gambar
            }

            return redirect()->route('motor.index')->with('success', 'Motor updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id)
    {
        Motor::findOrFail($id)->delete();
        return redirect()->route('motor.index')->with('success', 'Data deleted successfully.');
    }

}