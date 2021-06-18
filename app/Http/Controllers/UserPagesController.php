<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\jurusanModel;
use App\Models\NominalPembayaran;
use Illuminate\Support\Facades\Auth;

class UserPagesController extends Controller
{

    public function beranda(){
        // $bool = 'false';
        $nominalpembayaran = NominalPembayaran::all();
        return View('user.beranda',compact('nominalpembayaran'));
    }
    //return view login for user
    public function getformlogin(){
        //jika user sudah login,tidak bisa akses ke menu login
        // if(Auth::user()){
        //     return redirect('/');
        // }
        return view('user.login');
    }
    //return view register for user
    // public function getformregister(){
    //     $kelas = KelasModel::all();
    //     $jurusan = jurusanModel::all();
    //     return view('user.register',compact('kelas','jurusan'));
    // }

    public function getformpembayaran(){
        $nominalpembayaran = NominalPembayaran::all();
        return view('user.pembayaran',compact('nominalpembayaran'));
    }

    public function resetpassword(){
        return view('user.forgotpassword');
    }
}
