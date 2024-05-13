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
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Login berhasil
            $user = Auth::user();
            if ($user->level === 'superadmin' || $user->level === 'admin') {
                // Jika pengguna adalah superadmin atau admin, arahkan ke dashboard sesuai peran
                if ($user->level === 'superadmin') {
                    return redirect()->route('dashboard')->with('success', 'Login berhasil !');
                } elseif ($user->level === 'admin') {
                    return redirect()->route('dashboard')->with('success', 'Login berhasil !');
                }
            } else {
                // Jika pengguna adalah pengguna biasa, arahkan ke halaman landing page
                return redirect()->route('mdltransport')->with('success', 'Login berhasil !');
            }
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
