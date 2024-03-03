<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DataPenyewaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/datapenyewa', function () {
    return view('menu.datapenyewa');
});

Route::get('/datamobil', function () {
    return view('menu.datamobil');
});

Route::get('/laporan', function () {
    return view('menu.laporan');
});


// Route::get('/tambahpenyewa', function () {
//     return view('menu.tambahpenyewa');
// });

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasiuser', [RegistrasiController::class, 'registrasiuser'])->name('registrasiuser');


Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');


