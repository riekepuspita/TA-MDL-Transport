<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataMobil;
use App\Models\Pembayaran;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class DataPenyewaController extends Controller
{

    public function index(Request $request)
    {
         // Mengambil data penyewa, diurutkan berdasarkan created_at dalam urutan menurun
        $penyewa = DataPenyewa::with('pemesanan', 'pembayaran', 'user')
        ->orderBy('created_at', 'desc')
        ->get();

        // Mendapatkan data pemesanan, mobil, user, dan pembayaran
        $dataPemesanan = DataPemesanan::all();
        $mobil = DataMobil::all();
        $user = User::all();
        $pembayaran = Pembayaran::all();

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
        $indexPenyewa = new DataPenyewa();
        $penyewa_list = $indexPenyewa->index();

        // return ($penyewa_list);
        return view('menu.datapenyewa', compact('penyewa', 'mobil', 'dataPemesanan', 'user', 'pembayaran'));
    }


    public function insertpenyewa(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'noNIK' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
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
        ]);


        // Buat pemesanan baru
        $pemesanan = DataPemesanan::create([
            'penyewa_idPenyewa' => $penyewa->idPenyewa, // Menghubungkan pemesanan dengan data penyewa yang baru dibuat
            'mobil_noPolisi' => $validatedData['mobil_noPolisi'], // Gunakan nilai mobil_noPolisi yang diterima
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

    public function filterpenyewa(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');

        $penyewa = DataPenyewa::with(['user', 'pemesanan.mobil', 'pembayaran'])
            ->whereHas('pemesanan', function ($query) use ($month, $year) {
                if ($month) {
                    $query->whereMonth('tanggalMulai', $month);
                }
                if ($year) {
                    $query->whereYear('tanggalMulai', $year);
                }
            })
            ->get();

        return response()->json($penyewa);
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
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'tujuan' => 'required|string',
            'keberangkatan' => 'nullable|date_format:Y-m-d\TH:i',
            'mobil_noPolisi' => 'required|string|max:20',  // Tambahkan validasi untuk mobil_noPolisi
            'statusPembayaran' => 'required',
        ]);
        // return($validatedData);

        // Perbarui data penyewa
        $penyewa = DataPenyewa::findOrFail($idPenyewa);
        $penyewa->update([
            'noNIK' => $validatedData['noNIK'],
            'namaLengkap' => $validatedData['namaLengkap'],
            'jeniskelamin' => $validatedData['jeniskelamin'],
            'alamat' => $validatedData['alamat'],
            'noHP' => $validatedData['noHP'],
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

        $pembayaran = Pembayaran::where('pemesanan_idPemesanan',$pemesanan->idPemesanan)->first();

        if ($pembayaran){
            $pembayaran->update([
                'statusPembayaran' => $validatedData['statusPembayaran'][0],
            ]);
        } else {
            Pembayaran::create([
                'pemesanan_idPemesanan' => $pemesanan->idPemesanan,
                'user_idUser' => $validatedData['user_idUser'],
                'penyewa_idPenyewa' => $validatedData['penyewa_idPenyewa'],
                'tanggalPembayaran' => $validatedData['tanggalPembayaran'],
                'totalPembayaran' => $validatedData['totalPembayaran'],
                'statusPembayaran' => $validatedData['statusPembayaran'][0],

            ]);
        }



        // Menyimpan pesan sukses ke dalam session
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data ' . $penyewa->namaLengkap . ' Berhasil Diperbarui',
            'message' => "",
        ]);


        return redirect()->route('datapenyewa');
    }

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
}
