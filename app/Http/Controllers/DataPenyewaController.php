<?php

namespace App\Http\Controllers;

use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

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
        // $data = $request->all();

        DataPenyewa::create($request->all());

        // Menyimpan pesan sukses ke dalam session
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Ditambahkan',
            'message' => "",
        ]);

        return redirect()->route('datapenyewa');
    }

    public function tampilkanpenyewa($idPenyewa)
    {

        $data = DataPenyewa::find($idPenyewa);
        // dd($data);

        return view('menu.tampilpenyewa', compact('data'));
    }

    public function updatepenyewa(Request $request, $idPenyewa)
    {
        // $data = DataPenyewa::find($idPenyewa);
        // $data->update($request->all());

        // Session::flash('alert', [
        //     'type' => 'success',
        //     'title' => 'Data Berhasil Diubah',
        //     'message' => "",
        // ]);

        // return redirect()->route('datapenyewa');
        $data = DataPenyewa::findOrFail($idPenyewa);

        $data->noNIK = $request->noNIK;
        $data->namaLengkap = $request->namaLengkap;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->alamat = $request->alamat;
        $data->noHP = $request->noHP;

        $data->save();

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Diubah',
            'message' => "",
        ]);

        return redirect()->route('datapenyewa');
    }

    // public function delete($idPenyewa){
    //     $data = DataPenyewa::find($idPenyewa);
    //     $data->delete();

    //     return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Dihapus');
    // }

    public function delete($idPenyewa)
    {
        $data = DataPenyewa::find($idPenyewa);

        if ($data) {
            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Data ' . $data->namaLengkap . ' Berhasil Dihapus',
                'message' => "",
            ]);
            $data->delete();
        } else {
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Hapus Data Gagal',
                'message' => 'ID Penyewa Tidak Valid!',
            ]);
        }
        return back();
    }

    // if ($data) {
    //     $data->delete();
    //     return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Dihapus');
    // }
}
