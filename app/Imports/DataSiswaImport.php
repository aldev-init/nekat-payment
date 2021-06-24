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
