<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class DataUserPenyewaController extends Controller
{
    public function index()
    {
       //$user = User::all();
       $user = User::with('datapenyewa')->where('level', '=', 'user')->get();
       $penyewa = DataPenyewa::all();

       // dd($data);
        return view('menu.datauserpenyewa', compact('user', 'penyewa'));
    }

    public function insertuserpenyewa(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'namaUser' => 'required',
            'email' => 'required',
            'level' => 'required',
            'statusUser' => 'required',
            'noNIK' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'uploadKTP' => 'required|file',
        ]);

        if ($validator->fails()) {
            // dd($request);
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Input Data Gagal',
                'message' => 'Ada inputan yang salah!',
            ]);
        } else {

            $fileKTPName = $request->file('uploadKTP')->getClientOriginalName();
            $request->file('uploadKTP')->move('uploadKTP/', $fileKTPName);

            // dd($validator);
            $user = User::create([
                'namaUser' => $request->namaUser,
                'email' => $request->email,
                'password' => bcrypt('12345678'),
                'level' => $request->level,
                'statusUser' => $request->statusUser,
            ]);

            // Menyimpan data penyewa ke database
            $penyewa = DataPenyewa::create([
                'user_idUser' => $user->idUser, // foreign key untuk menghubungkan dengan tabel users
                'namaLengkap' => $user->namaUser,
                'noNIK' => $request->noNIK,
                'jeniskelamin' => $request->jeniskelamin,
                'alamat' => $request->alamat,
                'noHP' => $request->noHP,
                'uploadKTP' => $fileKTPName, // Validasi untuk file KTP yang diunggah
            ]);

            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Data Berhasil Ditambahkan',
                'message' => "",
            ]);
        }

        return redirect()->route('datauser');
    }

    public function tampilkanuserpenyewa($idUser)
    {

        $user = User::find($idUser);
        $penyewa = DataPenyewa::where('user_idUser', $user->idUser)->first(); // Asumsi 'user_id' adalah foreign key di tabel DataPenyewa 

        return view('menu.tampiluser', compact('user', 'penyewa'));
    }

    public function updateuserpenyewa(Request $request, $idUser)
    {

        $validatedData = $request->validate([
            'namaUser' => 'required',
            'email' => 'required',
            'level' => 'required',
            'statusUser' => 'required',
            'noNIK' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
        ]);

        $user = User::findOrFail($request->idUser);

        $user->update([
            'namaUser' => $validatedData['namaUser'],
            'email' => $validatedData['email'],
            'level' => $validatedData['level'],
            'statusUser' => $validatedData['statusUser'],

        ]);

        $penyewa = DataPenyewa::where('user_idUser', $idUser)->first();
        if ($penyewa) {
            $penyewa->update([
                'user_iduser' => $request->user_idUser,
                'noNIK' => $request->noNIK,
                'jeniskelamin' => $request->jeniskelamin,
                'alamat' => $request->alamat,
                'noHP' => $request->noHP,
            ]);
        }
        // $user->namaUser = $request->namaUser;
        // $user->email = $request->email;
        // $user->level = $request->level;
        // $user->statusUser = $request->statusUser;

        $user->save();


        // $data = User::find($idUser);
        // $data -> update($request->all());

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Diubah',
            'message' => "",
        ]);

        return redirect()->route('datauser');
    }

    public function deleteuserpenyewa($idUser)
    {
        $user = User::find($idUser);

        if ($user) {
            // Hapus data penyewa terkait jika ada
            $penyewa = $user->datapenyewa;
            if ($penyewa) {
                $penyewa->delete();
            }

            // Hapus user
            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Data ' . $user->namaUser . ' Berhasil Dihapus',
                'message' => "",
            ]);
            $user->delete();
        } else {
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Hapus Data Gagal',
                'message' => 'ID Admin Tidak Valid!',
            ]);
        }
        return back();
    }
}
