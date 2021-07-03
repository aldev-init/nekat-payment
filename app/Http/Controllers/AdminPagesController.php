<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDataModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Models\UserRecordModel;
use App\Models\NominalPembayaran;
use App\Models\BulanModel;
use App\Models\TodoModel;
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
        $userrecords = UserRecordModel::all();
        $jumlahtransaksi = count($userrecords);
        $todo = TodoModel::where('status','=','belum')->get();
        $todoselesai = TodoModel::where('status','=','selesai')->paginate(5);
        return view('admin.beranda',compact('jumlahsiswa','jumlahkelas','jumlahjurusan','jumlahtransaksi','todo','todoselesai'));
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
        //menyediakan variable untuk old input agar halaman tidak undefined variable
        $oldselect = null;
        $year = date('Y');
        $month = date('m');
        if($month == '01'){
          $month = 'Januari';
        }elseif ($month == '02') {
          $month = 'Februari';
        }elseif ($month == '03') {
          $month = 'Maret';
        }elseif ($month == '04') {
          $month = 'April';
        }elseif ($month == '05') {
          $month = 'Mei';
        }elseif ($month == '06') {
          $month = 'Juni';
        }elseif ($month == '07') {
          $month = 'Juli';
        }elseif ($month == '08') {
          $month = 'Agustus';
        }elseif ($month == '09') {
          $month = 'September';
        }elseif ($month == '10') {
          $month = 'Oktober';
        }elseif ($month == '11') {
          $month = 'November';
        }elseif ($month == '12') {
          $month = 'Desember';
        }
        $data = UserRecordModel::join('user_data','user_data.id','=','user_records.id_nama')
                                ->join('kelas','kelas.id','=','user_records.id_kelas')
                                ->join('jurusan','jurusan.id','=','user_records.id_jurusan')
                                ->join('bulan','bulan.id','=','user_records.id_bulan')
                                ->join('nominal_pembayaran','nominal_pembayaran.id','=','user_records.keterangan_pembayaran')
                                ->orderBy('user_records.created_at','desc')
                                ->where('bulan.bulan',$month)
                                ->where('user_records.tahun',$year)
                                ->get(['user_data.nama_lengkap','kelas.kelas','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','user_records.jumlah_bayar','user_records.created_at']);
        $kelas = KelasModel::all();
        return view('admin.transaksisiswa',compact('data','kelas','oldselect'));
    }
    public function kelasjurusan(){
        $kelas = KelasModel::paginate(4);
        $jurusan = JurusanModel::paginate(4);
        return view('admin.kelasjurusan',compact('kelas','jurusan'));
    }

    public function nominalpembayaran(){
        $nominal = NominalPembayaran::paginate(6);
        return view('admin.nominalpembayaran',compact('nominal'));
    }

    public function rekap(){
        $oldkelas = null;
        $oldtahun = null;
        $oldsemester = null;
        $data = UserRecordModel::join('user_data','user_records.id_nama','=','user_data.id')
                                ->join('kelas','user_records.id_kelas','=','kelas.id')
                                ->join('jurusan','user_records.id_jurusan','=','jurusan.id')
                                ->join('bulan','user_records.id_bulan','=','bulan.id')
                                ->join('nominal_pembayaran','user_records.keterangan_pembayaran','=','nominal_pembayaran.id')
                                ->orderBy('bulan.id','asc')
                                ->paginate(6,['user_data.nama_lengkap','user_data.id_kelas','kelas.kelas','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','nominal_pembayaran.nominal_pembayaran','user_records.created_at']);
        $kelas = KelasModel::all();
        return view('admin.rekap',compact('data','kelas','oldkelas','oldtahun','oldsemester'));
    }

    public function loadview(Request $request){
        //kondisi bulan tergantung request admin
        if($request->semester == 'semester1'){
            $month = ['Januari','Februari','Maret','April','Mei','Juni'];
        }elseif($request->semester == 'semester2'){
            $month = ['Juli','Agustus','September','Oktober','November','Desember'];
        }
        $data = UserRecordModel::join('user_data','user_records.id_nama','=','user_data.id')
                                ->join('kelas','user_records.id_kelas','=','kelas.id')
                                ->join('jurusan','user_records.id_jurusan','=','jurusan.id')
                                ->join('bulan','user_records.id_bulan','=','bulan.id')
                                ->join('nominal_pembayaran','user_records.keterangan_pembayaran','=','nominal_pembayaran.id')
                                ->where('kelas.id',$request->kelas)
                                ->where('tahun',$request->tahun)
                                ->whereIn('bulan.bulan',$month)
                                ->orderBy('bulan.id','asc')
                                ->paginate(6,['user_data.nama_lengkap','kelas.kelas','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','nominal_pembayaran.nominal_pembayaran','user_records.created_at']);
        $kelas = KelasModel::all();
        return view('admin.rekappdf',compact('data'));
    }


    // public function registerform(){
    //     return view('admin.register');
    // }
}
