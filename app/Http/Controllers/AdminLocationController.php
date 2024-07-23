<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10); // Default 10 items per page

        $locations = Location::query();

        if ($search) {
            $locations->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('tag', 'LIKE', "%{$search}%");
        }

        $locations = $locations->paginate($pageLength);

        return view('location', compact('locations', 'search', 'pageLength'));
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


        return redirect()->route('location.index')->with('success','Data created successfully.');
    }

    public function update(Request $request, $id)
    {
        $locations = Location::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
        ]);

        $locations->update([
            'name' => $request->name,
            'tag' => $request->tag,
        ]);

        return redirect()->route('location.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->route('location.index')->with('success', 'Data  deleted successfully.');
    }
}