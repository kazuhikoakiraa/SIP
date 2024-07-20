<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('location', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
            'tag' => $request->tag,
        ]);


        return redirect()->route('location.index')->with('succes','Location created successfully.');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
        ]);

        $location->update([
            'name' => $request->name,
            'tag' => $request->tag,
        ]);

        return redirect()->route('location.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
    }
}
