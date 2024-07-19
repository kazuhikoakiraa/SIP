<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use Illuminate\Http\Request;

class AdminPumpController extends Controller
{
    public function index()
    {
        $pump = Pump::all();
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

        $pump = Pump::create([
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
            $file_name = $pump->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $pump->img = $file_name;
            $pump->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert','Berhasil Menambahkan Data!');
    }

    public function update(Request $request, $id)
    {
        $pump = Pump::findOrFail($id);

        $validate = $request->validate([
            'sap_id' => 'required|integer|unique:motors,sap_id' . $id,
            'name' => 'required|string|max:255',
            'tag_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $pump->update([
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
            $file_name = $pump->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $pump->img = $file_name;
            $pump->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert','Berhasil Mengedit Data!');
    }

    public function destroy($id)
    {
        Pump::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Menghapus Data!');
    }


}
