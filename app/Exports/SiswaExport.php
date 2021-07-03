<?php

namespace App\Exports;

use App\Models\UserDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserDataModel::all();
    }
}
