<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    // $penyewa = DataPenyewa::with('pemesanan.mobil')->get();
    $penyewa = DataPenyewa::all();
    $dataPemesanan = DataPemesanan::all();
    $mobil = DataMobil::all();
    $user = User::all();

    // Inisialisasi array kosong untuk menampung data pemesanan
    $dataPemesanan = [];

    // Loop melalui setiap DataPenyewa untuk mengambil data pemesanannya
    foreach ($penyewa as $penyewaItem) {
        // Mengambil data pemesanan terkait dengan DataPenyewa saat ini
        $pemesanan = $penyewaItem->pemesanan;
        
        // Menambahkan data pemesanan ke dalam array $dataPemesanan
        $dataPemesanan[$penyewaItem->idPenyewa] = $pemesanan;
    }

    // Mengembalikan view dengan data yang sudah dikumpulkan
    return view('menu.datapenyewa', compact('penyewa', 'mobil', 'dataPemesanan', 'user'));
}


    public function insertpenyewa(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'noNIK' => 'required',
            // 'namaLengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'created_at' => 'required',
            'tanggalMulai' => 'required',
            'tanggalSelesai' => 'required',
            'tujuan' => 'required',
            'keberangkatan' => 'required',
            'mobil_noPolisi' => 'required',
            'user_idUser' => 'required|exists:users,id',
        ]);

        // Buat penyewa baru
        $penyewa = DataPenyewa::create([
            'noNIK' => $validatedData['noNIK'],
            'user_idUser' => $validatedData['user_idUser'],
            'jeniskelamin' => $validatedData['jeniskelamin'],
            'alamat' => $validatedData['alamat'],
            'noHP' => $validatedData['noHP'],
            'created_at' => $validatedData['created_at'],
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

        return redirect()->route('datapenyewa');
    }


    public function tampilkanpenyewa($idPenyewa)
    {
        $penyewa = DataPenyewa::findOrFail($idPenyewa);

        // Mengambil user yang terkait dengan penyewa
        $user = $penyewa->user;

        // $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();
        $pemesanan = DataPemesanan::all();

        return view('datapenyewa', compact('penyewa', 'pemesanan', 'user'));
    }

    public function updatepenyewa(Request $request, $idPenyewa)
{
    // Validasi request untuk data penyewa dan pemesanan
    $validatedData = $request->validate([
        'noNIK' => 'required',
        'namaLengkap' => 'required',
        'jeniskelamin' => 'required',
        'alamat' => 'required',
        'noHP' => 'required',
        'created_at' => 'required|date',
        'tanggalMulai' => 'required|date',
        'tanggalSelesai' => 'required|date',
        'tujuan' => 'required|string',
        'keberangkatan' => 'nullable|date_format:Y-m-d\TH:i',
        'mobil_noPolisi' => 'required|string|max:20',  // Tambahkan validasi untuk mobil_noPolisi
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

    // Perbarui nama user di tabel users
    $user = User::findOrFail($penyewa->user_idUser);
    $user->update([
        'noNIK' => $validatedData['noNIK'],
        'namaUser' => $validatedData['namaLengkap'],
        'jeniskelamin' => $validatedData['jeniskelamin'],
        'alamat' => $validatedData['alamat'],
        'noHP' => $validatedData['noHP'],
        
    ]);

    // Periksa apakah data pemesanan sudah ada atau belum
    $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();

    if ($pemesanan) {
        // Perbarui data pemesanan yang ada
        $pemesanan->update([
            'mobil_noPolisi' => $validatedData['mobil_noPolisi'],  // Tambahkan mobil_noPolisi
            'tanggalMulai' => $validatedData['tanggalMulai'],
            'tanggalSelesai' => $validatedData['tanggalSelesai'],
            'tujuan' => $validatedData['tujuan'],
            'keberangkatan' => $validatedData['keberangkatan'],

        ]);
    } else {
        // Buat data pemesanan baru
        DataPemesanan::create([
            'penyewa_idPenyewa' => $idPenyewa,
            'mobil_noPolisi' => $validatedData['mobil_noPolisi'],  // Tambahkan mobil_noPolisi
            'tanggalMulai' => $validatedData['tanggalMulai'],
            'tanggalSelesai' => $validatedData['tanggalSelesai'],
            'tujuan' => $validatedData['tujuan'],
            'keberangkatan' => $validatedData['keberangkatan'],
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
    //     // Validasi request
    //     $validatedData = $request->validate([
    //         'noNIK' => 'required',
    //         'namaLengkap' => 'required',
    //         'jeniskelamin' => 'required',
    //         'alamat' => 'required',
    //         'noHP' => 'required',
    //         'created_at' => 'required',
    //     ]);

    //     // Perbarui data penyewa
    //     $penyewa = DataPenyewa::findOrFail($idPenyewa);
    //     $penyewa->update([
    //         'noNIK' => $validatedData['noNIK'],
    //         'namaLengkap' => $validatedData['namaLengkap'],
    //         'jeniskelamin' => $validatedData['jeniskelamin'],
    //         'alamat' => $validatedData['alamat'],
    //         'noHP' => $validatedData['noHP'],
    //         'created_at' => $validatedData['created_at'],
    //     ]);

    //     // Perbarui data pemesanan yang terkait jika perlu
    //     $pemesanan = DataPemesanan::where('penyewa_idPenyewa', $idPenyewa)->first();
    //     if ($pemesanan) {
    //         $pemesanan->update([
    //             'mobil_noPolisi' => $request->mobil_noPolisi,
    //             'tanggalMulai' => $request->tanggalMulai,
    //             'tanggalSelesai' => $request->tanggalSelesai,
    //             'tujuan' => $request->tujuan,
    //             'keberangkatan' => $request->keberangkatan,
    //         ]);
    //     }

    //     // Menyimpan pesan sukses ke dalam session
    //     Session::flash('alert', [
    //         'type' => 'success',
    //         'title' => 'Data Berhasil Diperbarui',
    //         'message' => "",
    //     ]);

    //     return redirect()->route('datapenyewa');
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
