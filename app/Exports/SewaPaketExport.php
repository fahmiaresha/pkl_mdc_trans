<?php

namespace App\Exports;

use App\Sewa_Paket_Wisata;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SewaPaketExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sewa_Paket_Wisata::all();
    }
}
