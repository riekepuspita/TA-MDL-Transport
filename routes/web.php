<?php

use App\Http\Controllers\DataMobilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DataPenyewaController;
use App\Http\Controllers\DataUserController;

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

Route::get('/mdltransport', function () {
    return view('mdltransport');
})->name('mdltransport');


Route::middleware('guest')->group(function () {
    
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/auth', [LoginController::class, 'login'])->name('auth')->middleware('guest');
    Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi')->middleware('guest');
    Route::post('/registrasiuser', [RegistrasiController::class, 'registrasiuser'])->name('registrasiuser')->middleware('guest');
});



Route::middleware(['auth'])->group(function () {
    // Tambahkan rute-rute yang memerlukan otorisasi superadmin di sini

    Route::get('/datauser', [DataUserController::class, 'index'])->name('datauser');
    Route::get('/tambahuser', [DataUserController::class, 'tambahuser'])->name('tambahuser');
    Route::post('/insertuser', [DataUserController::class, 'insertuser'])->name('insertuser');
    Route::get('/tampilkanuser/{idUser}', [DataUserController::class, 'tampilkanuser'])->name('tampilkanuser');
    Route::post('/updateuser/{idUser}', [DataUserController::class, 'updateuser'])->name('updateuser');
    Route::get('/deleteuser/{idUser}', [DataUserController::class, 'deleteuser'])->name('deleteuser');

    Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
    Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
    Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
    Route::get('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
    Route::post('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
    Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

    Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
    Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
    Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
    Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
    Route::post('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
    Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');


});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');








// Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa')->middleware('auth');
// Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa')->middleware('auth');
// Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa')->middleware('auth');
// Route::get('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa')->middleware('auth');
// Route::post('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa')->middleware('auth');
// Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete')->middleware('auth');

// Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil')->middleware('auth');
// Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil')->middleware('auth');
// Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil')->middleware('auth');
// Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil')->middleware('auth');
// Route::post('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil')->middleware('auth');
// Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil')->middleware('auth');
