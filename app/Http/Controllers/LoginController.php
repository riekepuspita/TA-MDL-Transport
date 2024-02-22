<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  index(){
        $user = User::all();
        return view('login', compact('user'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd($request);

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/welcome')->with('success', 'Login berhasil!');
        }

        // Login gagal
        return redirect()->route('login')->with('error', 'Login gagal. Periksa username dan password Anda.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
