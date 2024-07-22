<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class AdminMotorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);

        $motor = Motor::query();

        if($search) {
            $motor->where('sap_id' , 'LIKE', "%{$search}%")
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

        return view('motor', compact('motor','search','pageLength'));
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

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $motor->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $motor->img = $file_name;
            $motor->update();
            $img->move('../public/assets/img/', $file_name);
        }


        return redirect()->route('motor.index')->with('success','Data created successfully.');
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

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $motor->img . '_' . time() . '.' . $img->getClientOriginalExtension();
            $motor->img = $file_name;
            $motor->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('motor.index')->with('success','Data edited successfully.');
    }

    public function destroy($id)
    {
        Motor::findOrFail($id)->delete();
        return redirect()->route('motor.index')->with('success','Data deleted successfully.');
    }
}
