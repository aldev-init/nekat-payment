<?php

namespace App\Imports;

use App\Models\UserDataModel;
use Maatwebsite\Excel\Concerns\ToModel;

class DataSiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //query search data from database
        $isexist = UserDataModel::where('nama_lengkap',$row[1])
                                ->where('email',$row[2])
                                ->where('alamat',$row[3])
                                ->where('nisn',$row[4])
                                ->where('nis',$row[5])
                                ->where('id_kelas',$row[6])
                                ->where('id_jurusan',$row[7])
                                ->where('password',$row[8])
                                ->where('role',$row[9])
                                ->get(['nama_lengkap','email','alamat','nisn','nis','id_kelas','id_jurusan','password','role']);
        //jika data pada excel sudah ada didatabase , return null
        if($isexist->first()){
            return null;
        }
        return new UserDataModel([
            'nama_lengkap' => $row[1],
            'email' => $row[2],
            'alamat' => $row[3],
            'nisn' => $row[4],
            'nis' => $row[5],
            'id_kelas' => $row[6],
            'id_jurusan' => $row[7],
            'password' => $row[8],
            'role' => $row[9]
        ]);
    }
}
