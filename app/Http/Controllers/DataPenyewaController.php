<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class DataPenyewaController extends Controller
{

    public function index()
    {
        $data = DataPenyewa::all();
        $dataPemesanan = DataPemesanan::all();
        $mobil = DataMobil::all();
        
        return view('menu.datapenyewa', compact('data','mobil','dataPemesanan'));
    }

    public function insertpenyewa(Request $request)
    {

        // Validasi request
        $validatedData = $request->validate([
            'noNIK' => 'required',
            'namaLengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'created_at' => 'required',
            'tanggalMulai' => 'required',
            'tanggalSelesai' => 'required',
            'tujuan' => 'required',
            'keberangkatan' => 'required',
            'mobil_noPolisi' => 'required',
        ]);

        // Buat penyewa baru
        $penyewa = DataPenyewa::create([
            'noNIK' => $validatedData['noNIK'],
            'namaLengkap' => $validatedData['namaLengkap'],
            'jeniskelamin' => $validatedData['jeniskelamin'],
            'alamat' => $validatedData['alamat'],
            'noHP' => $validatedData['noHP'],
            'created_at' => $validatedData['created_at'] ,
        ]);


        // Buat pemesanan baru
        $pemesanan = DataPemesanan::create([
            'penyewa_idPenyewa' => $penyewa->idPenyewa,
            'mobil_noPolisi' => $validatedData['mobil_noPolisi'],
            'tanggalMulai' => $validatedData['tanggalMulai'],
            'tanggalSelesai' => $validatedData['tanggalSelesai'],
            'tujuan' => $validatedData['tujuan'],
            'keberangkatan' => $validatedData['keberangkatan'],
        ]);



        // Menyimpan pesan sukses ke dalam session
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Ditambahkan',
            'message' => "",
        ]);

        // dd($request);

        return redirect()->route('datapenyewa');
    }


    // public function insertpenyewa(Request $request)
    // {
    //     // dd($request->all());
    //     // $data = $request->all();

    //     DataPenyewa::create($request->all());

    //     // Menyimpan pesan sukses ke dalam session
    //     Session::flash('alert', [
    //         'type' => 'success',
    //         'title' => 'Data Berhasil Ditambahkan',
    //         'message' => "",
    //     ]);

    //     return redirect()->route('datapenyewa');
    // }

    public function tampilkanpenyewa($idPenyewa)
    {
        $penyewa = DataPenyewa::findOrFail($idPenyewa);
        $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();

        return view('datapenyewa', compact('penyewa', 'pemesanan'));
    }

    // public function updatepenyewa(Request $request, $idPenyewa)
    // {
    //     // Validasi request
    //     $validatedData = $request->validate([
    //         // sesuaikan dengan kolom yang ingin diupdate
    //         'noNIK' => 'required',
    //         'namaLengkap' => 'required',
    //         'jeniskelamin' => 'required',
    //         'alamat' => 'required',
    //         'noHP' => 'required',
    //         'tanggalMulai' => 'required',
    //         'tanggalSelesai' => 'required',
    //         'tujuan' => 'required',
    //         'keberangkatan' => 'required',
    //         'mobil_noPolisi' => 'required',
    //     ]);

    //     // Update data penyewa
    //     $penyewa = DataPenyewa::findOrFail($idPenyewa);
    //     $penyewa->update($validatedData);

    //     // Update data pemesanan
    //     $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();
    //     $pemesanan->update($validatedData);

    //     // Menyimpan pesan sukses ke dalam session
    //     Session::flash('alert', [
    //         'type' => 'success',
    //         'title' => 'Data Berhasil Diupdate',
    //         'message' => "",
    //     ]);

    //     return redirect()->route('datapenyewa');
    // }


    // public function tampilkanpenyewa($idPenyewa)
    // {

    //     $data = DataPenyewa::find($idPenyewa);

    //     // dd($data);
        
    //     return view('menu.tampilpenyewa', compact('data'));
    // }

        public function updatepenyewa(Request $request, $idPenyewa)
    {
        // Validasi request
        $validatedData = $request->validate([
            'noNIK' => 'required',
            'namaLengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'created_at' => 'required',
        ]);

        // Perbarui data penyewa
        $penyewa = DataPenyewa::findOrFail($idPenyewa);
        $penyewa->update([
            'noNIK' => $validatedData['noNIK'],
            'namaLengkap' => $validatedData['namaLengkap'],
            'jeniskelamin' => $validatedData['jeniskelamin'],
            'alamat' => $validatedData['alamat'],
            'noHP' => $validatedData['noHP'],
            'created_at' => $validatedData['created_at'],
        ]);

        // Perbarui data pemesanan yang terkait jika perlu
        $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();
        if ($pemesanan) {
            $pemesanan->update([
                'mobil_noPolisi' => $request->mobil_noPolisi,
                'tanggalMulai' => $request->tanggalMulai,
                'tanggalSelesai' => $request->tanggalSelesai,
                'tujuan' => $request->tujuan,
                'keberangkatan' => $request->keberangkatan,
            ]);
        }

        // Menyimpan pesan sukses ke dalam session
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Diperbarui',
            'message' => "",
        ]);

        return redirect()->route('datapenyewa');
    }


    // public function updatepenyewa(Request $request, $idPenyewa)
    // {
    //     $data = DataPenyewa::findOrFail($idPenyewa);

    //     $data->noNIK = $request->noNIK;
    //     $data->namaLengkap = $request->namaLengkap;
    //     $data->jeniskelamin = $request->jeniskelamin;
    //     $data->alamat = $request->alamat;
    //     $data->noHP = $request->noHP;

    //     $data->save();

    //     Session::flash('alert', [
    //         'type' => 'success',
    //         'title' => 'Data Berhasil Diubah',
    //         'message' => "",
    //     ]);

    //     return redirect()->route('datapenyewa');
    // }

    // public function delete($idPenyewa){
    //     $data = DataPenyewa::find($idPenyewa);
    //     $data->delete();

    //     return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Dihapus');
    // }


        public function delete($idPenyewa)
{
    // Cari data penyewa
    $data = DataPenyewa::find($idPenyewa);

    if ($data) {
        // Hapus pemesanan yang terkait dengan penyewa ini
        DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->delete();

        // Hapus penyewa
        $data->delete();

        // Set pesan sukses
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data ' . $data->namaLengkap . ' Berhasil Dihapus',
            'message' => "",
        ]);
    } else {
        // Set pesan error jika data tidak ditemukan
        Session::flash('alert', [
            'type' => 'error',
            'title' => 'Hapus Data Gagal',
            'message' => 'ID Penyewa Tidak Valid!',
        ]);
    }

    // Redirect kembali ke halaman sebelumnya
    return back();
}


    // public function delete($idPenyewa)
    // {
    //     $data = DataPenyewa::find($idPenyewa);

    //     if ($data) {
    //         Session::flash('alert', [
    //             'type' => 'success',
    //             'title' => 'Data ' . $data->namaLengkap . ' Berhasil Dihapus',
    //             'message' => "",
    //         ]);
    //         $data->delete();
    //     } else {
    //         Session::flash('alert', [
    //             'type' => 'error',
    //             'title' => 'Hapus Data Gagal',
    //             'message' => 'ID Penyewa Tidak Valid!',
    //         ]);
    //     }
    //     return back();
    // }

    // if ($data) {
    //     $data->delete();
    //     return redirect()->route('datapenyewa')->with('success', 'Data Berhasil Dihapus');
    // }
}
