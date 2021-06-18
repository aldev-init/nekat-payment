<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDataModel;
use App\Models\KelasModel;
use App\Models\jurusanModel;
use Illuminate\Support\Facades\Auth;

class UserSystemController extends Controller
{
    //login system
    public function loginsystem(Request $request){
        $user = UserDataModel::where([
            'nis' => $request->nis,
            'password' => $request->password,
        ])->first();
        if($user){
            Auth::login($user);
            return redirect('/')->with('login','Login Berhasil');
        }else{
            return redirect('/login')->with('login','Login Gagal');
        }
    }

    //register system for user
    // public function registersystem(Request $request){
    //     //validate
    //     //jika nis dan nisn sudah ada didatabase,user tidak bisa daftar
    //     request()->validate([
    //         'nisn' => 'unique:user_data,nisn',
    //         'nis' => 'unique:user_data,nis'
    //     ]);

    //     //insert data,with object model
    //     $data = new UserDataModel();
    //     $data->nickname = $request -> nickname;
    //     $data->nama_lengkap = $request -> nama_lengkap;
    //     $data->email = $request -> email;
    //     $data->alamat = $request -> alamat;
    //     $data->nisn = $request -> nisn;
    //     $data->nis = $request -> nis;
    //     $data->id_kelas = $request -> id_kelas;
    //     $data -> id_jurusan = $request -> id_jurusan;
    //     $data -> password = bcrypt($request -> password);

    //     $data->save();
    //     return redirect('/');
    // }

    public function profile(){
        $kelas = KelasModel::all();
        $jurusan = jurusanModel::all();
        $datauser = [
            'id' => Auth::user()->id,
            'password' => Auth::user()->password,
            'nama_lengkap' => Auth::user()->nama_lengkap,
            'email' => Auth::user()->email,
            'alamat' => Auth::user()->alamat,
            'nisn' => Auth::user()->nisn,
            'nis' => Auth::user()->nis,
            'id_kelas' => Auth::user()->id_kelas,
            'id_jurusan' => Auth::user()->id_jurusan
        ];
        return view('user.profile',compact('datauser','kelas','jurusan'));
    }

    public function editprofile(Request $request,$id){
        $userUpdate = UserDataModel::where('id','=',$id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
        ]);
        if($userUpdate > 0){
            return redirect('/profile')->with('edit','Edit Profile Berhasil');
        }else{
            return redirect('/profile')->with('edit','Edit Profile Gagal');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('login','Logout Berhasil');
    }
}
