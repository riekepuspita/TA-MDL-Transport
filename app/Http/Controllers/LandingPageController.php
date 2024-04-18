<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use Illuminate\Http\Request;

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
}
