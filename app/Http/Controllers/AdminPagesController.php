<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDataModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Models\UserRecordModel;
use PDO;

class AdminPagesController extends Controller
{
    public function beranda(){
        //kembalikan ke halaman login jika admin belum login
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login')->with('status','Login Terlebih Dahulu');
        }
        $siswa = UserDataModel::all();
        $jumlahsiswa = count($siswa);
        $kelas = KelasModel::all();
        $jumlahkelas = count($kelas);
        $jurusan = JurusanModel::all();
        $jumlahjurusan = count($jurusan);
        return view('admin.beranda',compact('jumlahsiswa','jumlahkelas','jumlahjurusan'));
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
                                ->orderBy('user_data.id')
                                ->paginate(5,['user_data.id','nama_lengkap','email','alamat','nisn','nis','kelas.kelas','jurusan.jurusan','password','user_data.id_kelas','user_data.id_jurusan']);
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.datasiswa',compact('data','kelas','jurusan',));
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
        $data = UserRecordModel::join('user_data','user_data.id','=','user_records.id_nama')
                                ->join('kelas','kelas.id','=','user_records.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_records.id_jurusan')
                                ->join('bulan','bulan.id','=','user_records.id_bulan')
                                ->join('nominal_pembayaran','nominal_pembayaran.id','=','user_records.keterangan_pembayaran')
                                ->orderBy('user_records.created_at','desc')
                                ->get(['user_data.nama_lengkap','kelas.kelas','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','user_records.jumlah_bayar','user_records.created_at']);
        return view('admin.transaksisiswa',compact('data'));
    }
    public function kelasjurusan(){
        $kelas = KelasModel::paginate(4);
        $jurusan = JurusanModel::paginate(4);
        return view('admin.kelasjurusan',compact('kelas','jurusan'));
    }


    // public function registerform(){
    //     return view('admin.register');
    // }
}
