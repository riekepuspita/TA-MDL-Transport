<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
    $penyewa = DataPenyewa::count();
    // $user = User::where('level','Admin')->count();
    $mobil = DataMobil::count();
    

    return view('dashboard', compact('mobil','penyewa'));
   }  
}
