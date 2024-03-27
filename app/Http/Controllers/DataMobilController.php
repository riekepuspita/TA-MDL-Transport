<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataMobilController extends Controller
{
    public function index()
    {
        $data = DataMobil::all();

        // dd($data);
        // return($data);
        return view('menu.datamobil', compact('data'));
    }

    public function tambahmobil()
    {
        // dd($data);
        return view('menu.tambahmobil');
    }

    public function insertmobil(Request $request)
    {
        // dd($request->all());

        $data = DataMobil::create($request->all());

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Ditambahkan',
            'message' => "",
        ]);


        if($request->hasFile('gambarMobil')){
            $request->file('gambarMobil')->move('gambarMobil/', $request->file('gambarMobil')->getClientOriginalName());
            $data->gambarMobil = $request->file('gambarMobil')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('datamobil');
    }

    public function tampilkanmobil($noPolisi)
    {
        $data = DataMobil::where('noPolisi', $noPolisi)->first();
        // $data = DataMobil::find($noPolisi);

        // dd($data);
        return view('menu.tampilmobil', compact('data'));
    }

    public function updatemobil(Request $request, $noPolisi)
    {
        $data = DataMobil::where('noPolisi', $noPolisi)->first();
        // $data = DataMobil::find($noPolisi);

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Diubah',
            'message' => "",
        ]);

        $data->update($request->all());
        return redirect()->route('datamobil');
    }

    public function deletemobil($noPolisi)
    {
        // $data = DataMobil::where('noPolisi', $noPolisi)->first();
        $data = DataMobil::find($noPolisi);

        if ($data) {
            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Data ' . $data->modelMobil . ' Berhasil Dihapus',
                'message' => "",
            ]);
            $data->delete();
        } else {
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Hapus Data Gagal',
                'message' => 'ID Mobil Tidak Valid!',
            ]);
        }
        return back();

        // if ($data) {
        //     $data->delete();
        //     return redirect()->back()->with('success', 'Data berhasil dihapus.');
        // } 
    }
}
