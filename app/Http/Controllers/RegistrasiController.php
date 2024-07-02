<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi');
    }

    public function registrasiuser(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'namaUser' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noNIK' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'uploadKTP' => 'required|file', // Validasi untuk file KTP yang diunggah
        ]);

        // Simpan file KTP yang diunggah ke penyimpanan yang sesuai (misalnya penyimpanan lokal)
        $fileKTPName = $request->file('uploadKTP')->getClientOriginalName();
        $request->file('uploadKTP')->move('uploadKTP/', $fileKTPName);

        // Membuat record User baru
        $user = User::create([
            'namaUser' => $request->namaUser,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'statusUser' => 'aktif'
        ]);
        
        $datapenyewa = new DataPenyewa();
        $datapenyewa->namaLengkap =  $user->namaUser;
        $datapenyewa->noNIK = $request->noNIK;
        $datapenyewa->jenisKelamin = $request->jeniskelamin;
        $datapenyewa->alamat = $request->alamat;
        $datapenyewa->noHP = $request->noHP;
        $datapenyewa->user_idUser = $user->idUser;
        $datapenyewa->uploadKTP = $fileKTPName;
        $datapenyewa->save();

        // Pengalihan ke halaman login
        return redirect('login');
    }
}
