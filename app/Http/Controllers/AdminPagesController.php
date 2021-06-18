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
        return view('admin.beranda');
    }

    public function loginform(){
        // if( Auth::user() && Auth::user()->role == 'admin'){
        //     return redirect('/admin/beranda');
        // }elseif(Auth::user() && Auth::user()->role == 'user'){
        //     return redirect('/');
        // }
        return view('admin.login');
    }
    public function dataSiswa(){

        //query database join
        $data = UserDataModel::join('kelas','kelas.id','=','user_data.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_data.id_jurusan')
                                ->get(['user_data.id','nama_lengkap','email','alamat','nisn','nis','kelas.kelas','jurusan.jurusan']);
        $pagination = UserDataModel::paginate(5);
        return view('admin.datasiswa',compact('data','pagination'));
    }
    public function tambahData(){
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.tambahdataform',compact('kelas','jurusan'));
    }
    public function editData($id){
        $siswa = UserDataModel::find($id);
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.editdata',compact('siswa','kelas','jurusan'));
    }
    public function riwayat(){
        return view('admin.transaksisiswa');
    }

    // public function registerform(){
    //     return view('admin.register');
    // }
}
