<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next, ...$levels)
    {
        // Ambil peran pengguna saat ini
        $level = Auth::user()->level;

        // Cek apakah peran pengguna termasuk dalam daftar peran yang diperbolehkan
        if (in_array($level, $levels)) {
            // Jika peran pengguna termasuk dalam daftar peran yang diperbolehkan,
            // lanjutkan permintaan ke middleware berikutnya
            return $next($request);
        }

        // Jika peran pengguna tidak diperbolehkan, redirect ke halaman landing page
        return redirect('/login');
    }
}
