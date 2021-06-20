<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDataModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use PDO;

class AdminPagesController extends Controller
{
    public function beranda(){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        return view('admin.beranda');
    }

    public function loginform(){
        //jika admin sudah login,tidak bisa akses halaman login
        if(Auth::guard('admin')->check()){
            return redirect('/admin/beranda')->with('status','Logout Terlebih Dahulu');
        }

        //jika sudah login berstatus user,tidak bisa akses halaman login admin
        if( Auth::check() && Auth::user()->role == 'user'){
            return redirect('/');
        }

        return view('admin.login');
    }
    public function dataSiswa(){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        //query database join
        $data = UserDataModel::join('kelas','kelas.id','=','user_data.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_data.id_jurusan')
                                ->get(['user_data.id','nama_lengkap','email','alamat','nisn','nis','kelas.kelas','jurusan.jurusan','password','user_data.id_kelas','user_data.id_jurusan']);
        $pagination = UserDataModel::paginate(5);
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.datasiswa',compact('data','pagination','kelas','jurusan',));
    }
    public function tambahData(){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.tambahdataform',compact('kelas','jurusan'));
    }
    public function editData($id){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        $siswa = UserDataModel::find($id);
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.editdata',compact('siswa','kelas','jurusan'));
    }
    public function riwayat(){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        return view('admin.transaksisiswa');
    }
    public function kelasjurusan(){
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.kelasjurusan',compact('kelas','jurusan'));
    }


    // public function registerform(){
    //     return view('admin.register');
    // }
}
