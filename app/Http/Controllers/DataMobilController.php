<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use Illuminate\Http\Request;

class DataMobilController extends Controller
{
    public function index()
    {
        $data = DataMobil::all();

        // dd($data);
        return view('menu.datamobil', compact('data'));
    }
}
