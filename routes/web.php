<?php

use App\Http\Controllers\DataMobilController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Route::get('/datapenyewa', function () {
//     return view('menu.datapenyewa');
// });

Route::get('/datamobil', function () {
    return view('menu.datamobil');
});

Route::get('/laporan', function () {
    return view('menu.laporan');
});


// Route::get('/tambahmobil', function () {
//     return view('menu.tambahmobil');
// });

Route::get('/landingpage', function () {
    return view('landingpage.landingpage');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasiuser', [RegistrasiController::class, 'registrasiuser'])->name('registrasiuser');

Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa')->middleware('auth');
Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa')->middleware('auth');
Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa')->middleware('auth');
Route::get('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa')->middleware('auth');
Route::post('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa')->middleware('auth');
Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete')->middleware('auth');

Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
Route::post('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');