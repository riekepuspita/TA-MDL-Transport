<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi');
    }
     
    public function registrasiuser(Request $request)
    {
    User::create([
            'namaUser' => $request -> namaUser,
            'email' => $request -> email,
            'password' => bcrypt($request->password),
            //'remember_token' => Str::random(60),
        ]);

        return redirect('login');
    }
}
