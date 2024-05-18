<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{

    public function homeIndex()
    {
        // $user = User::all();

        //Ambil data user yang login
        $user = Auth::user();

        return view('mdltransport', [
            "title" => "MDL Transport",
            "user" => $user
        ]);
    }

    public function aboutIndex()
    {
        $user = Auth::user();

        return view('about', [
            "title" => "About",
            "user" => $user
        ]);
    }

    public function mobilIndex()
    {
        $data = DataMobil::all(); // Mengambil semua data mobil dari database
        $title = "Mobil"; // Definisikan variabel title
        $user = Auth::user();
        // dd($data);

        return view('mobil', compact('data', 'title', 'user')); // Menampilkan halaman landingpage dengan mengirimkan data mobil dan title
    }

    public function contactIndex()
    {
        $user = Auth::user();

        return view('contact', [
            "title" => "Contact",
            "user" => $user
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
        $user = Auth::user();

        $idUser = $user->idUser;

        if (!$data) {
            return redirect()->route('mobilmdltransport')->with('error', 'Mobil tidak ditemukan');
        }

        return view('reservasi', [
            "title" => "Mobil",
            'mobil' => $data,
        ], compact('user', 'idUser'));

        // return view('reservasi', ["title" => "Mobil"], compact('data', 'user'));
    }

    public function insertreservasi(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'created_at' => 'required|date',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'mobil_noPolisi' => 'required|string|max:20',
        ]);

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        $dataPenyewa = DataPenyewa::where('user_idUser', $user->idUser)->first();
        if (!$dataPenyewa) {
            return redirect()->route('mobilmdltransport')->with('error', 'Data penyewa tidak ditemukan');       
         }

        // Simpan data penyewa
        $penyewa = new DataPenyewa();
        $penyewa->created_at = $validatedData['created_at'];
        $penyewa->namaLengkap = $dataPenyewa->namaUser;
        $penyewa->noNIK = $dataPenyewa->noNIK;
        $penyewa->jeniskelamin = $dataPenyewa->jeniskelamin;
        $penyewa->alamat = $dataPenyewa->alamat;
        $penyewa->noHP = $dataPenyewa->noHP;
        $penyewa->user_idUser = $user->idUser; // Tambahkan user_idUser
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
        //$pemesanan = DataPemesanan::findOrFail($idPemesanan);
        $pemesanan = DataPemesanan::with(['penyewa', 'penyewa.user', 'mobil'])->findOrFail($idPemesanan);
        $penyewa = $pemesanan->penyewa;
        // Dapatkan data mobil berdasarkan nomor polisi dari DataMobil
        $mobil = DataMobil::where('noPolisi', $pemesanan->noPolisi)->first();
        $user = Auth::user();
        // dd($pemesanan);

        return view('detailreservasi', [
            "title" => "Mobil",
            "pemesanan" => $pemesanan,
            "penyewa" => $penyewa,
            "mobil" => $mobil, // Tambahkan data mobil ke array
            "user" => $user
        ]);
    }
}
