<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDataModel;
use App\Models\KelasModel;
use App\Models\jurusanModel;
use App\Models\NominalPembayaran;
use App\Models\BulanModel;
use App\Models\UserRecordModel;
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
        $id = Auth::user()->id;
        $data = UserDataModel::join('kelas','user_data.id_kelas','=','kelas.id')
                                ->join('jurusan','user_data.id_jurusan','=','jurusan.id')
                                ->where('user_data.id',$id)
                                ->get(['user_data.nama_lengkap','user_data.password','user_data.alamat',
                                'kelas.kelas','jurusan.jurusan','user_data.nis','user_data.nisn']);
        return view('user.profile',compact('data'));
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

    public function payment(Request $request){
        $oldbulan = $request->bulan;
        //check data in user_records
        $isExist = UserRecordModel::where('id_nama','=',$request->id_nama)
                                    ->where('id_bulan','=',$request->bulan)
                                    ->where('tahun','=',date('Y'))
                                    ->get(['id_nama','id_bulan'])->first();
        //if payment exist,return status
        if(!empty($isExist)){
            return redirect('/pembayaran')->with('status','Maaf Pembayaran Bulan Tersebut Sudah Ada');
        }
        //get name class from user login
        $datauser = UserDataModel::join('kelas','kelas.id','=','user_data.id_kelas')
                                    ->where('user_data.nama_lengkap','=',Auth::user()->nama_lengkap)
                                    ->get('kelas.kelas')->first();
        //slice name class and get first text
        $kelasuser = explode(' ',$datauser->kelas)[0];
        $keteranganpembayaran = $request->nama_pembayaran;
        $alamat = $request->alamat;
        $bulan = BulanModel::all();
        $nominalpembayaran = NominalPembayaran::all();

        //pembayaran spp request
        $bulan_request = $request->bulan;
        $nominalpembayaran_request = $request->nominal_pembayaran;

        $name = explode(' ',Auth::user()->nama_lengkap);
        $email = Auth::user()->email;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-t64-Cn6TwrReYWZzi1AIoxKl';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->nominal_pembayaran + $request->biaya_admin,
                'name' => $request->nama_pembayaran,
            ),
            'customer_details' => array(
                'first_name' => $name[0],
                'last_name' => $name[1],
                'email' => $email,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.pembayaran',compact('snapToken','nominalpembayaran','keteranganpembayaran','bulan','bulan_request','nominalpembayaran_request','kelasuser','oldbulan'));
    }

    public function paymentfinish(){
        //change timezone for function Date()
        date_default_timezone_set('Asia/Jakarta');

        $bulan = $_GET['bulan'];
        //nama bawaan dari $_GET
        $namapembayaran = $_GET['amp;nama'];
        $nominal = $_GET['amp;nominal'];

        //insert riwayat transaksi
        $data = UserRecordModel::insert([
            'id_nama' => Auth::user()->id,
            'id_kelas' => Auth::user()->id_kelas,
            'id_jurusan' => Auth::user()->id_jurusan,
            'id_bulan' => $bulan,
            'keterangan_pembayaran' => $namapembayaran,
            'jumlah_bayar' => $nominal,
            'created_at' => date('Y-m-d H:i:s'),
            'tahun' => date('Y'),
        ]);
        return redirect('/riwayat')->with('alert','Transaksi Berhasil');
    }
}
//Tinggal Tambah Payment Channel Di Midtrans
