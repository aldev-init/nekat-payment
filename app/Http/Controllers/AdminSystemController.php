<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminData;
use Illuminate\Support\Facades\Auth;
use App\Models\KelasModel;
use App\Models\UserDataModel;
use App\Models\JurusanModel;

class AdminSystemController extends Controller
{
    public function loginsystem(Request $request){
        $admin = AdminData::where([
                'nipd' => $request->nipd,
                'password' => $request->password
            ])->first();
        if($admin){
            Auth::guard('admin')->login($admin);
            if(Auth::guard('admin')->check()){
                return redirect('/admin/beranda')->with('status','Login Berhasil');
            }
        }else{
            return redirect('/admin/login')->with('status','Login Gagal');
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('status','Logout Berhasil');
    }

    //crud kelas
    public function hapuskelas($id){
        $hapus = KelasModel::where('id','=',$id)->delete();
        return redirect('/admin/kelasjurusan')->with('status','Data Berhasil Dihapus');
    }
    public function ubahkelas($id,Request $request){
        $ubah = KelasModel::where('id','=',$id)->update('status','Data Berhasil Diubah');
    }
    public function tambahkelas(Request $request){
        $kelas = new KelasModel();
        $kelas->kelas = $request->kelas;
        $kelas->save();
        return redirect('/admin/kelasjurusan')->with('status','Tambah Data Kelas Berhasil');
    }

    //crud jurusan
    public function hapusjurusan($id){
        $hapus = JurusanModel::where('id','=',$id)->delete();
        return redirect('/admin/kelasjurusan')->with('status','Data Berhasil Dihapus');
    }
    public function ubahjurusan($id,Request $request){
        $ubah = JurusanModel::where('id','=',$id)->update([
            'jurusan' => $request->jurusan,
        ]);
        return redirect('/admin/kelasjurusan')->with('status','Data Berhasil Diubah');
    }

    public function tambahjurusan(Request $request){
        $jurusan = new JurusanModel();
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();
        return redirect('/admin/kelasjurusan')->with('status','Tambah Data Jurusan Berhasil');
    }
    public function search(Request $request){
        $data= UserDataModel::where('nama_lengkap','like',"%".$request->nama_lengkap."%")->paginate();
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.datasiswa',compact('data','kelas','jurusan'));
    }

    // public function registersystem(Request $request){
    //     request()->validate([
    //         'nipd' => 'required',
    //         'password' => 'required',
    //         'confirmpassword' => 'required|same:password'
    //     ]);
    //     AdminData::create([
    //         'nipd' => $request->nipd,
    //         'password' => bcrypt($request->password)
    //     ]);
    // }
}

