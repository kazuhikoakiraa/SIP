<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageLength = $request->input('pageLength', 10);
        $profile = User::query();

        if ($search) {
            $profile->where('name', 'LIKE', "%{$search}%")
                ->orWhere('username', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('jabatan', 'LIKE', "%{$search}%");
        }

        $profile = $profile->paginate($pageLength);

        return view('profile', compact('profile', 'search', 'pageLength'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'jabatan' => 'nullable|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $profile = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $profile->id . '_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets/img/'), $file_name);
            $profile->img = $file_name;
            $profile->save();
        }

        return redirect()->route('profile.index')->with('success', 'Data Created Successfully.');
    }

    public function confirmPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (Hash::check($request->password, auth()->user()->password)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // Untuk mengupdate profil
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'jabatan' => 'required|string|max:255',
        'current_password' => 'required|string',
    ]);

    $user = User::findOrFail($id);

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.'])->withInput();
    }

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->jabatan = $request->jabatan;

    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $user->img = $filename;
    }

    $user->save();

    return redirect()->route('profile.index', $user->id)->with('success', 'Profil berhasil diperbarui.');
}

// Untuk mengupdate password
public function updatePassword(Request $request, $id)
{
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string',
    ]);

    $user = User::findOrFail($id);

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.'])->withInput();
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('profile.index', $user->id)->with('success', 'Password berhasil diperbarui.');
}


    public function destroy(Request $request, $id)
    {
        $profile = User::findOrFail($id);

        // Validate password
        if (!Hash::check($request->password, $profile->password)) {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }

        $profile->delete();
        return redirect()->route('profile.index')->with('success', 'Data Deleted Successfully.');
    }


}