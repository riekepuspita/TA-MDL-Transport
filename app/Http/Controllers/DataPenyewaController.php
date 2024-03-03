<?php

namespace App\Http\Controllers;

use App\Models\DataPenyewa;
use Illuminate\Http\Request;

class DataPenyewaController extends Controller
{

    public function index()
    {
        $data = DataPenyewa::all();

        // dd($data);
        return view('menu.datapenyewa', compact('data'));
    }

    public function tambahpenyewa()
    {
        return view('menu.tambahpenyewa');
    }

    public function insertpenyewa(Request $request)
    {
        // dd($request->all());
        DataPenyewa::create($request->all());
        return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Ditambahkan');
    }
}
