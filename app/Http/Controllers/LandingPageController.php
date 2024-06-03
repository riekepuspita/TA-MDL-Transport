<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Pembayaran;
use Midtrans\Snap;
use Midtrans\Config;

class LandingPageController extends Controller
{
    public function __construct()
    {
        // Atur kredensial Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

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

        $user = Auth::user();
        // Jika data mobil tidak ditemukan, bisa ditangani sesuai kebutuhan, misalnya redirect ke halaman lain
        if (!$data) {
            return redirect()->route('mobil')->with('error', 'Mobil tidak ditemukan');
        }

        // Mengirim data mobil ke view detailmobil.blade.php
        return view('detailmobil', [
            "title" => "Mobil",
            "mobil" => $data,
            "user" => $user
        ]);
    }

    public function reservasi($noPolisi)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

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
        // $penyewa = new DataPenyewa();
        // $penyewa->created_at = $validatedData['created_at'];
        // $penyewa->namaLengkap = $dataPenyewa->namaUser;
        // $penyewa->noNIK = $dataPenyewa->noNIK;
        // $penyewa->jeniskelamin = $dataPenyewa->jeniskelamin;
        // $penyewa->alamat = $dataPenyewa->alamat;
        // $penyewa->noHP = $dataPenyewa->noHP;
        // $penyewa->user_idUser = $user->idUser; // Tambahkan user_idUser
        // $penyewa->save();

        // Simpan data pemesanan
        $pemesanan = new DataPemesanan();
        $pemesanan->penyewa_idPenyewa = $dataPenyewa->idPenyewa;
        $pemesanan->mobil_noPolisi = $validatedData['mobil_noPolisi']; // Gunakan nilai mobil_noPolisi yang diterima
        $pemesanan->tanggalMulai = $validatedData['tanggalMulai'];
        $pemesanan->tanggalSelesai = $validatedData['tanggalSelesai'];
        $pemesanan->tujuan = $validatedData['tujuan'];
        $pemesanan->save();

        // Kirim notifikasi WhatsApp
        $data = [
            'api_key' => 'VbxBHKDunZYEBJjA10u4edyXRcGWlq',
            'sender' => '6285335086890',
            'number' => '6281359742459',
            'message' => 'Hallo, terdapat reservasi masuk, segera cek pada system MDL Transport'
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.izam.men/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // echo $response;

        if ($response) {
            // Pesan berhasil dikirim
        } else {
            // Pesan gagal dikirim, Anda bisa menambahkan log atau notifikasi di sini
            return 'Pesan gagal dikirim: ' . $response;
        }

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

        // Definisikan parameter transaksi
        $transactionParams = [
            'transaction_details' => [
                'order_id' => Str::uuid(), // Gunakan UUID untuk membuat order_id unik
                'gross_amount' => $pemesanan->mobil->hargaSewa, // Ganti dengan jumlah yang sesuai
            ],
            'customer_details' => [
                'first_name' => $penyewa->namaLengkap,
                'email' => $penyewa->user->email,
                'phone' => $penyewa->noHP,
            ],
        ];

        $snapToken = Snap::getSnapToken($transactionParams);

        // Simpan data transaksi ke tabel pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->pemesanan_idPemesanan = $pemesanan->idPemesanan;
        $pembayaran->user_idUser = $user->idUser;
        $pembayaran->penyewa_idPenyewa = $penyewa->idPenyewa;
        $pembayaran->tanggalPembayaran = now(); // Atur tanggal pembayaran ke waktu saat ini
        $pembayaran->totalPembayaran = $transactionParams['transaction_details']['gross_amount'];
        $pembayaran->statusPembayaran = 'berhasil'; // Atur status awal sesuai kebutuhan
        $pembayaran->save();

        return view('detailreservasi', [
            "title" => "Mobil",
            "pemesanan" => $pemesanan,
            "penyewa" => $penyewa,
            "mobil" => $mobil,
            "user" => $user,
            "snapToken" => $snapToken,
            "pembayaran" => $pembayaran
        ]);
    }

    public function batalPemesanan($idPemesanan)
    {
        // Temukan pemesanan berdasarkan ID
        $pemesanan = DataPemesanan::find($idPemesanan);

        if ($pemesanan) {
            // Hapus pemesanan jika ditemukan
            $pemesanan->delete();
            return redirect()->route('mobilmdltransport')->with('success', 'Pemesanan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }
    }
}
