<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class AdminMotorController extends Controller
{
    public function index()
    {
        $motor = Motor::all();
        return view();
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id',
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $motor = Motor::create([
            'sap_id' => $request->sap_id,
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'location' => $request->location,
            'brand' => $request->brand,
            'model' => $request->model,
            'ampere' => $request->ampere,
            'power' => $request->power,
            'front_bearing' => $request->front_bearing,
            'rear_bearing' => $request->rear_bearing,
            'speed' => $request->speed,
            'note' => $request->note,
        ]);

        return back()->with('alert','Berhasil Menambahkan Data!');
    }

    public function update(Request $request, $id)
    {
        $motor = Motor::findOrFail($id);

        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id' . $id,
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $motor->update([
            'sap_id' => $request->sap_id,
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'location' => $request->location,
            'brand' => $request->brand,
            'model' => $request->model,
            'ampere' => $request->ampere,
            'power' => $request->power,
            'front_bearing' => $request->front_bearing,
            'rear_bearing' => $request->rear_bearing,
            'speed' => $request->speed,
            'note' => $request->note,
        ]);

        return back()->with('alert','Berhasil Mengedit Data!');
    }

    public function destroy($id)
    {
        Motor::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Menghapus Data!');
    }
}
