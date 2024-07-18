<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index()
    {
        $location = Location::all();
        return view('location', compact('location'));
    }

    public function store(Request $request)
    {
        $validate  = $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
        ]);

        $location = Location::create([
            'name' => $request->name,
            'tag' => $request->tag,
        ]);

        return back()->with('alert','Berhasil Menambahkan Data!');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validate  = $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
        ]);

        $location->update([
            'name' => $request->name,
            'tag' => $request->tag,

        ]);

        return back()->with('alert','Berhasil Mengedit Data!');

    }

    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return back()->with('alert','Berhasil Menghapus data');
    }
}
