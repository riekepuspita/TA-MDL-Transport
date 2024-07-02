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

    public function insertmobil(Request $request)
    {
        $data = DataMobil::create($request->all());    

        if ($request->hasFile('gambarMobil')) {
            $request->file('gambarMobil')->move('gambarMobil/', $request->file('gambarMobil')->getClientOriginalName());
            $data->gambarMobil = $request->file('gambarMobil')->getClientOriginalName();
            $data->save();
        }

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Ditambahkan',
            'message' => "",
        ]);

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
        $data = DataMobil::findOrFail($noPolisi);

        // Hapus gambar lama jika ada
        if ($request->hasFile('gambarMobil')) {
            $gambarLama = $data->gambarMobil;
            if ($gambarLama !== null) {
                // Hapus gambar lama dari direktori penyimpanan
                $path = public_path('gambarMobil/' . $gambarLama);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            // Unggah gambar baru dan simpan nama file ke database
            $request->file('gambarMobil')->move('gambarMobil/', $request->file('gambarMobil')->getClientOriginalName());
            $data->gambarMobil = $request->file('gambarMobil')->getClientOriginalName();
        }

        // Update data mobil dengan data baru
        $data->merekMobil = $request->merekMobil;
        $data->modelMobil = $request->modelMobil;
        $data->kapasitasMobil = $request->kapasitasMobil;
        $data->tahunMobil = $request->tahunMobil;
        $data->deskripsiMobil = $request->deskripsiMobil;
        $data->hargaSewa = $request->hargaSewa;
        $data->statusMobil = $request->statusMobil;

        // Simpan perubahan
        $data->save();

        return redirect()->route('datamobil');
    }

    public function deletemobil($noPolisi)
    {
        $data = DataMobil::find($noPolisi);
    
        if ($data) {
            // Hapus gambar mobil jika ada
            $gambarLama = $data->gambarMobil;
            if ($gambarLama !== null) {
                // Hapus gambar dari direktori penyimpanan
                $path = public_path('gambarMobil/' . $gambarLama);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
    
            // Hapus entri mobil dari database
            $data->delete();
    
            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Data ' . $data->modelMobil . ' Berhasil Dihapus',
                'message' => "",
            ]);
        } else {
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Hapus Data Gagal',
                'message' => 'ID Mobil Tidak Valid!',
            ]);
        }
        return back();
    }
}
