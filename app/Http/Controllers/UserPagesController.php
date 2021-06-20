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
        return View('user.beranda');
    }
    //return view login for user
    public function getformlogin(){
        //jika user belum logout tidak bisa akses halaman login
        if(Auth::check()){
            return redirect('/')->with('login','Logout Terlebih dahulu');
        }

        //jika admin sudah login tidak bisa akses halaman login user
        if( Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'admin'){
            return redirect('/admin/beranda');
        }

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
