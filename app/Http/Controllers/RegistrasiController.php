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
        ]);

        // Membuat record User baru
        $user = User::create([
            'namaUser' => $request->namaUser,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'statusUser' => 'aktif'
        ]);

        // Membuat record DataPenyewa yang terkait dengan user yang baru dibuat
        $penyewa = new DataPenyewa([
            'namaLengkap'=> $user->namaUser,
            'noNIK' => $request->noNIK,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'noHP' => $request->noHP,
            'user_idUser' => $user->idUser
        ]);

        // Menyimpan record DataPenyewa yang terkait dengan user
        $user->datapenyewa()->save($penyewa);

        // dd($penyewa);

        // Pengalihan ke halaman login
        return redirect('login');
    }


}
