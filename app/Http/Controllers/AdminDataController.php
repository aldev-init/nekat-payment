<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDataModel;

class AdminDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswa = new UserDataModel();
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->email = $request->email;
        $siswa->alamat = $request->alamat;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_jurusan = $request->id_jurusan;
        $siswa->password = $request->password;
        $siswa->role = 'user';

        $issave = $siswa->save();
        if($issave){
            return redirect('/admin/datasiswa')->with('alert','Tambah Data Berhasil');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $siswa = UserDataModel::where('id','=',$id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'id_kelas' => $request->id_kelas,
            'id_jurusan' => $request->id_jurusan,
            'password' => $request->password,
        ]);
        return redirect('/admin/datasiswa')->with('alert','Ubah Data Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $siswa = UserDataModel::where('id','=',$id)->update([

        // ])
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UserDataModel::where('id','=',$id)->delete();
        if($delete > 0){
            return redirect('/admin/datasiswa')->with('alert','Hapus Data Berhasil');
        }else{
            return redirect('/admin/datasiswa')->with('alert','Hapus Data Gagal');
        }
    }
}
