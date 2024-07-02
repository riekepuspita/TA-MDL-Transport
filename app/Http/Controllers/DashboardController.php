<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard()
    {
        $data = DataMobil::all();
        $penyewa = DataPenyewa::count();
        $mobil = DataMobil::count();
        // dd($data);
        // return($data);
        return view('dashboard', compact('data', 'mobil', 'penyewa'));
    }
}
