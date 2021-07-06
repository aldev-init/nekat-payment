<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\jurusanModel;
use App\Models\NominalPembayaran;
use App\Models\UserRecordModel;
use App\Models\BulanModel;
use App\Models\UserDataModel;
use App\Models\PostAdminModel;
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
        $oldbulan = null;
        $datauser = UserDataModel::join('kelas','kelas.id','=','user_data.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_data.id_jurusan')
                                ->where('user_data.id',Auth::user()->id)
                                ->get(['user_data.id','nama_lengkap','email','alamat','nisn','nis','kelas.kelas','jurusan.jurusan','password','user_data.id_kelas','user_data.id_jurusan'])[0];
        $nominalpembayaran = NominalPembayaran::all();
        $kelasuser = explode(' ',$datauser->kelas)[0];
        $bulan = BulanModel::all();
        return view('user.pembayaran',compact('nominalpembayaran','bulan','kelasuser','oldbulan'));
    }

    public function riwayat(){
        //get id user login
        $id = Auth::user()->id;
        $data = UserRecordModel::join('user_data','user_data.id','=','user_records.id_nama')
                                ->join('kelas','kelas.id','=','user_records.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_records.id_jurusan')
                                ->join('bulan','bulan.id','=','user_records.id_bulan')
                                ->join('nominal_pembayaran','nominal_pembayaran.id','=','user_records.keterangan_pembayaran')
                                ->orderBy('user_records.created_at','desc')
                                ->where('user_data.id',$id)
                                ->get(['bulan.bulan','nominal_pembayaran.nama_pembayaran','user_records.jumlah_bayar','user_records.created_at']);
        return view('user.riwayat',compact('data'));
    }

    public function news(){
        $post = PostAdminModel::orderBy('created_at','desc')->get();
        return view('user.nekatnews',compact('post'));
    }

    public function resetpassword(){
        return view('user.forgotpassword');
    }

    public function panduanaplikasi(){
        return view('user.panduanaplikasi');
    }
}
