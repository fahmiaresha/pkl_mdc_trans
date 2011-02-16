<?php

namespace App\Exports;

use App\Sewa_Bus;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SewaBusExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sewa_Bus::all();
        // $customer=DB::table('customer')->get();
        // $pengguna=DB::table('pengguna')->get();
        // $sewa_bus=DB::table('sewa_bus')
        // ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        // ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        // ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        // 'sewa_bus.TGL_AKHIR_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        // 'sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA', 'sewa_bus.STATUS_SEWA',
        // 'sewa_bus.SISA_SEWA_BUS', 'sewa_bus.DP_BUS', 'sewa_bus.total_payment')
        // ->get();

        // return view('sewa_bus', ['sewa_bus' =>$sewa_bus, 'customer'=>$customer,
        // 'pengguna'=>$pengguna]);
    }
}
