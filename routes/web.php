<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMobilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DataPenyewaController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\LandingPageController;
use App\Models\DataPenyewa;

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

Route::get('/mdltransport', [LandingPageController::class, 'homeIndex'])->name('mdltransport');
Route::get('/about', [LandingPageController::class, 'aboutIndex'])->name('aboutmdltransport');
Route::get('/mobil', [LandingPageController::class, 'mobilIndex'])->name('mobilmdltransport');
Route::get('/contact', [LandingPageController::class, 'contactIndex'])->name('contactmdltransport');
Route::get('riwayatpemesanan', [LandingPageController::class, 'riwayatpemesanan'])->name('riwayatpemesanan');
Route::get('/detailmobil/{noPolisi}', [LandingPageController::class, 'detailMobil'])->name('detailMobil');
Route::get('/reservasi/{noPolisi}', [LandingPageController::class, 'reservasi'])->name('reservasi');
Route::post('/insertreservasi', [LandingPageController::class, 'insertreservasi'])->name('insertreservasi');
Route::get('/detailreservasi/{idPemesanan}', [LandingPageController::class, 'detailreservasi'])->name('detailreservasi');
Route::delete('/batalpemesanan/{idPemesanan}', [LandingPageController::class, 'batalPemesanan'])->name('batalPemesanan');
Route::post('/ispaid/{pembayaran}', [LandingPageController::class, 'ispaid'])->name('ispaid');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasiuser', [RegistrasiController::class, 'registrasiuser'])->name('registrasiuser');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
    Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
    Route::get('/filterpenyewa', [DataPenyewaController::class, 'filterpenyewa'])->name('filterpenyewa');
    Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
    Route::put('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
    Route::put('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
    Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

    Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
    Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
    Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
    Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
    Route::put('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
    Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Tambahkan rute-rute lain yang memerlukan otorisasi superadmin di sini

    // Rute yang hanya dapat diakses oleh superadmin
    Route::middleware(['CekLevel:superadmin'])->group(function () {
        // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/datauser', [DataUserController::class, 'index'])->name('datauser');
        Route::get('/tambahuser', [DataUserController::class, 'tambahuser'])->name('tambahuser');
        Route::post('/insertuser', [DataUserController::class, 'insertuser'])->name('insertuser');
        Route::put('/tampilkanuser/{idUser}', [DataUserController::class, 'tampilkanuser'])->name('tampilkanuser');
        Route::put('/updateuser/{idUser}', [DataUserController::class, 'updateuser'])->name('updateuser');
        Route::get('/deleteuser/{idUser}', [DataUserController::class, 'deleteuser'])->name('deleteuser');

        // Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
        // Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
        // Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
        // Route::put('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
        // Route::put('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
        // Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

        // Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
        // Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
        // Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
        // Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
        // Route::put('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
        // Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');

        // Route::get('/laporan', function () {
        //     return view('menu.laporan');
        // });
        // Tambahkan rute-rute lain yang memerlukan otorisasi superadmin di sini
    });

    // Rute yang hanya dapat diakses oleh admin
    Route::middleware(['CekLevel:admin'])->group(function () {
        // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
        // Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
        // Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
        // Route::put('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
        // Route::put('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
        // Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

        // Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
        // Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
        // Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
        // Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
        // Route::put('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
        // Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');

        // Route::get('/laporan', function () {
        //     return view('menu.laporan');
        // });;
        // Tambahkan rute-rute lain yang memerlukan otorisasi admin di sini
    });
});






// Route::middleware(['auth', 'CekLevel:superadmin'])->group(function () {
//     // Tambahkan rute-rute yang memerlukan otorisasi superadmin di sini
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard')->middleware('auth');

//     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     // Route::resource('/dashboard', DashboardController::class); 

//     Route::get('/datauser', [DataUserController::class, 'index'])->name('datauser');
//     Route::get('/tambahuser', [DataUserController::class, 'tambahuser'])->name('tambahuser');
//     Route::post('/insertuser', [DataUserController::class, 'insertuser'])->name('insertuser');
//     Route::put('/tampilkanuser/{idUser}', [DataUserController::class, 'tampilkanuser'])->name('tampilkanuser');
//     Route::put('/updateuser/{idUser}', [DataUserController::class, 'updateuser'])->name('updateuser');
//     Route::get('/deleteuser/{idUser}', [DataUserController::class, 'deleteuser'])->name('deleteuser');

//     Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
//     Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
//     Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
//     Route::put('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
//     Route::put('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
//     Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

//     Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
//     Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
//     Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
//     Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
//     Route::put('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
//     Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');

//     Route::get('/laporan', function () {
//         return view('menu.laporan');
//     });
// });

// Route::middleware(['auth', 'CekLevel:admin'])->group(function () {
//     // Tambahkan rute-rute yang memerlukan otorisasi superadmin di sini
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard')->middleware('auth');

//     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     // Route::resource('/dashboard', DashboardController::class); 

//     // Route::get('/datauser', [DataUserController::class, 'index'])->name('datauser');
//     // Route::get('/tambahuser', [DataUserController::class, 'tambahuser'])->name('tambahuser');
//     // Route::post('/insertuser', [DataUserController::class, 'insertuser'])->name('insertuser');
//     // Route::put('/tampilkanuser/{idUser}', [DataUserController::class, 'tampilkanuser'])->name('tampilkanuser');
//     // Route::put('/updateuser/{idUser}', [DataUserController::class, 'updateuser'])->name('updateuser');
//     // Route::get('/deleteuser/{idUser}', [DataUserController::class, 'deleteuser'])->name('deleteuser');

//     Route::get('/datapenyewa', [DataPenyewaController::class, 'index'])->name('datapenyewa');
//     Route::get('/tambahpenyewa', [DataPenyewaController::class, 'tambahpenyewa'])->name('tambahpenyewa');
//     Route::post('/insertpenyewa', [DataPenyewaController::class, 'insertpenyewa'])->name('insertpenyewa');
//     Route::put('/tampilkanpenyewa/{idPenyewa}', [DataPenyewaController::class, 'tampilkanpenyewa'])->name('tampilkanpenyewa');
//     Route::put('/updatepenyewa/{idPenyewa}', [DataPenyewaController::class, 'updatepenyewa'])->name('updatepenyewa');
//     Route::get('/delete/{idPenyewa}', [DataPenyewaController::class, 'delete'])->name('delete');

//     Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
//     Route::get('/tambahmobil', [DataMobilController::class, 'tambahmobil'])->name('tambahmobil');
//     Route::post('/insertmobil', [DataMobilController::class, 'insertmobil'])->name('insertmobil');
//     Route::get('/tampilkanmobil/{noPolisi}', [DataMobilController::class, 'tampilkanmobil'])->name('tampilkanmobil');
//     Route::put('/updatemobil/{noPolisi}', [DataMobilController::class, 'updatemobil'])->name('updatemobil');
//     Route::get('/deletemobil/{noPolisi}', [DataMobilController::class, 'deletemobil'])->name('deletemobil');

//     Route::get('/laporan', function () {
//         return view('menu.laporan');
//     });
// });


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
