<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        // User::create($request->all());

        $validator = Validator::make($request->all(), [
            'namaUser' => 'required',
            'email' => 'required',
            'level' => 'required',
            'statusUser' => 'required',
        ]);
        
        if ($validator->fails()) {
            // dd($request);
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Input Data Gagal',
                'message' => 'Ada inputan yang salah!',
            ]);
        } else {
            // dd($validator);
            User::create([
                'namaUser' => $request->namaUser,
                'email' => $request->email,
                'password' => bcrypt('12345678'),
                'level' => $request->level,
                'statusUser' => $request->statusUser,
            ]);
    

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Ditambahkan',
            'message' => "",
        ]);
        }

        return redirect()->route('datauser');
    }

    public function tampilkanuser($idUser){

        $data = User::find($idUser);
        // dd($data);

        return view('menu.tampiluser', compact('data'));
    }

    public function updateuser(Request $request, $idUser){
        $data = User::find($idUser);
        $data -> update($request->all());
        
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data Berhasil Diubah',
            'message' => "",
        ]);

        return redirect()->route('datauser');
    }

    // public function deleteuser($idUser)
    // {
    //     $data = User::find($idUser);

    //     if ($data) {
    //         $data->delete();
    //         return redirect()->route('datauser');
    //         // ->with('success', 'Data Berhasil Dihapus');
    //     }
    // }

    public function deleteuser($idUser){
    $data = User::find($idUser);

    if($data) {
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Data '.$data->namaUser.' Berhasil Dihapus',
            'message' => "",
        ]); 
        $data->delete();
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
