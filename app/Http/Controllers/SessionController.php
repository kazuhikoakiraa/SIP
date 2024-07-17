<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        // return view("sesi/index");
    }

    function login(Request $request){

        Session::flash('username',$request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',

        ],
        [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,

        ];

        if(Auth::attempt($infologin)){
            return 'sukses';
        }else{
            // return 'gagal';
            return redirect('sesi')->withErrors('Username dan Password yang dimasukan tidak valid');
        }

    }
}