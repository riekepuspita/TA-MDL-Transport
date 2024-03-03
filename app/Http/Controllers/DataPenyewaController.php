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

    public function tampilkanpenyewa($idPenyewa){

        $data = DataPenyewa::find($idPenyewa);
        // dd($data);

        return view('menu.tampilpenyewa', compact('data'));
    }

    public function updatepenyewa(Request $request, $idPenyewa){
        $data = DataPenyewa::find($idPenyewa);
        $data -> update($request->all());

        return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($idPenyewa){
        $data = DataPenyewa::find($idPenyewa);
        $data->delete();
        
        return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Dihapus');
    }

}
