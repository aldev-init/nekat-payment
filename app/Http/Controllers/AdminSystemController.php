<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminData;
use Illuminate\Support\Facades\Auth;
use App\Models\KelasModel;
use App\Models\UserDataModel;
use App\Models\JurusanModel;
use App\Models\NominalPembayaran;
use App\Models\UserRecordModel;
use App\Models\BulanModel;
use App\Exports\SiswaExport;
use PDF;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataSiswaImport;
use App\Models\TodoModel;
use Illuminate\Validation\ValidationException;

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
        if($hapus){
            return redirect('/admin/kelasjurusan')->with('status','Data Berhasil Dihapus');
        }else{
            return redirect('/admin/kelasjurusan')->with('status','Data Gagal Dihapus');
        }
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
        if($hapus){
            return redirect('/admin/kelasjurusan')->with('status','Data Berhasil Dihapus');
        }else{
            return redirect('/admin/kelasjurusan')->with('status','Data Gagal Dihapus');
        }
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
        $data= UserDataModel::join('kelas','user_data.id_kelas','=','kelas.id')
                            ->join('jurusan','user_data.id_jurusan','=','jurusan.id')
                            ->where('nama_lengkap','like',"%".$request->nama_lengkap."%")->paginate();
        $kelas = KelasModel::all();
        $jurusan = JurusanModel::all();
        return view('admin.datasiswa',compact('data','kelas','jurusan'));
    }

    public function tambahpembayaran(Request $request){
        $nominal = new NominalPembayaran();
        $nominal->nama_pembayaran = $request->nama_pembayaran;
        $nominal->nominal_pembayaran = $request->nominal_pembayaran;
        $nominal->biaya_admin = $request->biaya_admin;
        $nominal->save();
        return redirect('/admin/nominalpembayaran')->with('status','Tambah Data Pembayaran Berhasil');
    }

    public function hapuspembayaran($id){
        $data = NominalPembayaran::where('id','=',$id)->delete();
        if($data){
            return redirect('/admin/nominalpembayaran')->with('status','Pembayaran Berhasil Dihapus');
        }else{
            return redirect('/admin/nominalpembayaran')->with('status','Pembayaran Gagal Dihapus');
        }
    }

    public function editpembayaran($id,Request $request){
        $data = NominalPembayaran::where('id','=',$id)->update([
            'nama_pembayaran' => $request->nama_pembayaran,
            'nominal_pembayaran' => $request->nominal_pembayaran,
            'biaya_admin' => $request->biaya_admin,
        ]);
        if($data){
            return redirect('/admin/nominalpembayaran')->with('status','Ubah Data Berhasil');
        }else{
            return redirect('/admin/nominalpembayaran')->with('status','Ubah Data Gagal');
        }
    }

    public function customrekap(Request $request){
        $oldkelas = $request->kelas;
        $oldtahun = $request->tahun;
        $oldsemester = $request->semester;
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
                                ->paginate(6,['user_data.nama_lengkap','user_data.id_kelas','kelas.kelas','kelas.id','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','nominal_pembayaran.nominal_pembayaran','user_records.created_at']);
        //list all student based on class
        $siswakelas = KelasModel::join('user_data','user_data.id_kelas','=','kelas.id')
                                    ->where('id_kelas',$request->kelas)
                                    ->get(['user_data.nama_lengkap']);
        //if request nama_lengkap there is
        if($request->has('nama_lengkap')){
            $data = UserRecordModel::join('user_data','user_records.id_nama','=','user_data.id')
                                ->join('kelas','user_records.id_kelas','=','kelas.id')
                                ->join('jurusan','user_records.id_jurusan','=','jurusan.id')
                                ->join('bulan','user_records.id_bulan','=','bulan.id')
                                ->join('nominal_pembayaran','user_records.keterangan_pembayaran','=','nominal_pembayaran.id')
                                ->where('user_data.nama_lengkap',$request->nama_lengkap)
                                ->where('kelas.id',$request->kelas)
                                ->where('tahun',$request->tahun)
                                ->whereIn('bulan.bulan',$month)
                                ->orderBy('bulan.id','asc')
                                ->paginate(6,['user_data.nama_lengkap','user_data.id_kelas','kelas.kelas','kelas.id','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','nominal_pembayaran.nominal_pembayaran','user_records.created_at']);
            $nama = $request->nama_lengkap;
        }
        $kelas = KelasModel::all();
        $currentClass = KelasModel::find($request->kelas);
        //jika tombol submit ditombol rekap valuenya pdf
        if($request->pdf == 'pdf'){
            $isCanPDF = view('admin.rekappdf',compact('data'))->data;
            //jika variable $isCanPDF tidak null
            if(!empty($isCanPDF)){
                //print to pdf
                $pdf = PDF::loadview('admin.rekappdf',compact('data','currentClass','oldtahun','oldsemester'))->setPaper('A4','potrait');
                if(isset($nama)){
                    $pdf = PDF::loadview('admin.rekappdf',compact('data','currentClass','oldtahun','oldsemester','nama'))->setPaper('A4','potrait');
                }
                //simpan file sementara pdf ke directory public
                Storage::put('public/PDFrekap/rekapPDF.pdf', $pdf->output());
                //donwload pdf
                return $pdf->download('rekapPDF.pdf');
            }
        }
        return view('admin.rekap',compact('data','kelas','oldkelas','oldtahun','oldsemester','siswakelas'));
    }

    public function customtransaksi(Request $request){
        //mengakali old input select
        $oldselect = $request->kelas;
        //mengambil tahun sekarang
        $year = date('Y');
        //kondisi bulan berdasarkan bulan sekarang
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
                                ->where('user_data.id_kelas',$request->kelas)
                                ->get(['user_data.nama_lengkap','kelas.kelas','jurusan.jurusan','bulan.bulan',
                                'nominal_pembayaran.nama_pembayaran','user_records.jumlah_bayar','user_records.created_at']);
        $kelas = KelasModel::all();
        return view('admin.transaksisiswa',compact('data','kelas','oldselect'));
    }

    public function importexcel(Request $request){
        //nama file random berdasarkan date
        $waktu = date('Y-m-d');
        $slice = explode('-',$waktu);
        $hasil = join('',$slice);

        $validext = ['xls','xlsx'];
        $extensions = explode('.',$request->file('file')->getClientOriginalName())[1];
        if(!in_array($extensions,$validext)){
            return redirect('/admin/datasiswa')->with('status','Kesalahan File Ekstension,Gagal Import');
        }

        //menangkap file dan memasukan ke variable file
        $file = $request->file('file');
        //random nama file
        $namafile = $hasil.$file->getClientOriginalName();
        //upload file ke folder public
        $file->move('file_import',$namafile);
        //import data
        $attr = Excel::import(new DataSiswaImport,public_path('/file_import/'.$namafile));
        if($attr){
            return redirect('/admin/datasiswa')->with('status','Import Berhasil');
        }else{
            return redirect('/admin/datasiswa')->with('status','Import Gagal');
        }
    }

    public function exportexcel(){
        $date = date('Y-m-d');
        $dateslice = explode('-',$date);
        $datejoin = join('',$dateslice);
        $namafile = $datejoin.'siswa.xlsx';
        $export = Excel::store(new SiswaExport,$namafile,'excel_export');

        if($export){
            $path = asset('file_export/'.$namafile);
            $backredirect = '/admin/datasiswa';
            echo "<h1 style='text-align:center; margin-bottom:100px;'>Klik Link Dibawah Untuk Mulai Download</h1>";
            echo "<a href=".$path." style='margin-left:650px; font-size:25px;'>download</a><br>";
            echo "<a href=".$backredirect." style='margin-left:675px;'>Kembali</a>";
        }else{
            return redirect('/admin/datasiswa')->with('alert','Export Gagal');
        }
    }

    public function tambahtodo(Request $request){
        $todo = new TodoModel();
        $todo -> nama_kegiatan = $request->nama_kegiatan;
        $todo -> status = 'belum';
        $todo -> save();
        return redirect('/admin/beranda');
    }

    public function hapustodo($id){
        $todo = TodoModel::where('id','=',$id)->delete();
        return redirect('/admin/beranda');
    }

    public function todoselesai($id){
        $todo = TodoModel::where('id','=',$id)->update([
            'status'=> 'selesai',
        ]);
        return redirect('/admin/beranda');
    }

    // public function printPDF(){
    //     $pdf = PDF::loadview('admin.rekap',compact('kelas','data','oldkelas','oldtahun','oldsemester'))->setPaper('A4','potrait');
    //     return $pdf->stream();
    // }

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

