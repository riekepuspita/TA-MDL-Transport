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
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd($request);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        // Login gagal
        return redirect()->route('login')->with('error', 'Login gagal. Periksa email dan password Anda.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
