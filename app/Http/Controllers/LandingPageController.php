<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;

class LandingPageController extends Controller
{

    public function homeIndex()
    {
        return view('mdltransport', [
            "title" => "MDL Transport"
        ]);
    }

    public function aboutIndex()
    {
        return view('about', [
            "title" => "About"
        ]);
    }

    public function mobilIndex()
    {
        $data = DataMobil::all(); // Mengambil semua data mobil dari database
        $title = "Mobil"; // Definisikan variabel title
        // dd($data);

        return view('mobil', compact('data', 'title')); // Menampilkan halaman landingpage dengan mengirimkan data mobil dan title
    }

    public function contactIndex()
    {
        return view('contact', [
            "title" => "Contact"
        ]);
    }

    public function detailmobil($noPolisi)
    {
        // Mengambil data mobil berdasarkan nomor polisi
        $data = DataMobil::where('noPolisi', $noPolisi)->first();
        // dd($data);

        // Jika data mobil tidak ditemukan, bisa ditangani sesuai kebutuhan, misalnya redirect ke halaman lain
        if (!$data) {
            return redirect()->route('mobil')->with('error', 'Mobil tidak ditemukan');
        }

        // Mengirim data mobil ke view detailmobil.blade.php
        return view('detailmobil', [
            "title" => "Mobil",
            "mobil" => $data,
        ]);
    }

    public function reservasi($noPolisi)
    {
        $data = DataMobil::where('noPolisi', $noPolisi)->first();
        
        if (!$data) {
            return redirect()->route('mobilmdltransport')->with('error', 'Mobil tidak ditemukan');
        }

        return view('reservasi', [
            "title" => "Mobil",
            'mobil' => $data
        ]);
    }

        public function insertreservasi(Request $request)
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
            'mobil_noPolisi' => 'required', // Tambahkan validasi untuk mobil_noPolisi
        ]);

        // Simpan data penyewa
        $penyewa = new DataPenyewa();
        $penyewa->noNIK = $validatedData['noNIK'];
        $penyewa->namaLengkap = $validatedData['namaLengkap'];
        $penyewa->jeniskelamin = $validatedData['jeniskelamin'];
        $penyewa->alamat = $validatedData['alamat'];
        $penyewa->noHP = $validatedData['noHP'];
        $penyewa->created_at = $validatedData['created_at'];
        $penyewa->save();

        // Simpan data pemesanan
        $pemesanan = new DataPemesanan();
        $pemesanan->penyewa_idPenyewa = $penyewa->idPenyewa;
        $pemesanan->mobil_noPolisi = $validatedData['mobil_noPolisi']; // Gunakan nilai mobil_noPolisi yang diterima
        $pemesanan->tanggalMulai = $validatedData['tanggalMulai'];
        $pemesanan->tanggalSelesai = $validatedData['tanggalSelesai'];
        $pemesanan->tujuan = $validatedData['tujuan'];
        $pemesanan->save();

        // Redirect kembali dengan pesan sukses atau apapun yang diperlukan
        return redirect()->route('detailreservasi', ['idPemesanan' => $pemesanan->idPemesanan])->with('success', 'Data berhasil disimpan');
    }

        public function detailreservasi($idPemesanan)
    {
        $pemesanan = DataPemesanan::findOrFail($idPemesanan);
        
        $penyewa = $pemesanan->penyewa;

        // Dapatkan data mobil berdasarkan nomor polisi dari DataMobil
        $mobil = DataMobil::where('noPolisi', $pemesanan->noPolisi)->first();

        // dd($pemesanan);

        return view('detailreservasi', [
            "title" => "Mobil",
            "pemesanan" => $pemesanan,
            "penyewa" => $penyewa,
            "mobil" => $mobil // Tambahkan data mobil ke array
        ]);
    }
}
