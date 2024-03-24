<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index()
    {
        $data = User::all();

        // dd($data);
        return view('menu.datauser', compact('data'));
    }

    public function tambahuser()
    {
        return view('menu.tambahuser');
    }

    public function insertuser(Request $request)
    {
        // dd($request->all());
        User::create($request->all());

        return redirect()->route('datauser')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilkanuser($idUser){

        $data = User::find($idUser);
        // dd($data);

        return view('menu.tampiluser', compact('data'));
    }

    public function updateuser(Request $request, $idUser){
        $data = User::find($idUser);
        $data -> update($request->all());

        return redirect()->route('datauser')->with('success', 'Data Berhasil Diubah');
    }

    public function deleteuser($idUser)
    {
        $data = User::find($idUser);

        if ($data) {
            $data->delete();
            return redirect()->route('datauser');
            // ->with('success', 'Data Berhasil Dihapus');
        }
    }
}
