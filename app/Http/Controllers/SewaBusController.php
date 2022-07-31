<?php

namespace App\Http\Controllers;

use App\sewa_bus;
use App\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Exports\SewaBusExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SewaBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('login');
        }
        else{
        $schedule_armada=DB::table('schedule_armada')->get();
        $customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        'sewa_bus.TGL_AKHIR_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        'sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA', 'sewa_bus.STATUS_SEWA',
        'sewa_bus.SISA_SEWA_BUS', 'sewa_bus.DP_BUS', 'sewa_bus.total_payment')
        ->get();

        
        $max = DB::table('sewa_bus')->max('ID_SEWA_BUS');
        date_default_timezone_set('Asia/Jakarta');
        $date=date("ymd",time());

        $max=substr($max,6);
        if($max>=1){
            $ID_SEWA_BUS=$date.str_pad($max+1,4,"0",STR_PAD_LEFT);
        }
        else{
            $ID_SEWA_BUS=$date.str_pad(1,4,"0",STR_PAD_LEFT);
        }
        
        return view('sewa_bus', ['sewa_bus' =>$sewa_bus,'ID_SEWA_BUS'=>$ID_SEWA_BUS,'customer'=>$customer,
        'pengguna'=>$pengguna, 'schedule_armada'=>$schedule_armada]);
    }
}

    public function generateSewa(){

        $idsewa="INV2020110101";
        return $idsewa;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            DB::table('sewa_bus')->insert([
                'ID_SEWA_BUS'       => $request->ID_SEWA_BUS,
                'TGL_SEWA_BUS'      => $request->TGL_SEWA,
                'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA,
                'ID_CUSTOMER'       => $request->ID_CUSTOMER,
                'ID_PENGGUNA'       => $request->ID_PENGGUNA,
                'SISA_SEWA_BUS'     => $request->HARGA_SEWA_BUS,
                'JAM_SEWA'          => $request->JAM_SEWA,
                'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA,
                'DP_BUS'            =>  $request->DP_SEWA,
                'SISA_SEWA_BUS'     =>  $request->SISA_SEWA_BUS,
                'total_payment'     => $request->total_payment,
                // 'TGL'               => $request->TGL,
                'STATUS_SEWA'       => $request->statussewa
                
            ]);

            // DB::table('schedule_armada')->insert([
            //     'ID_SEWA_BUS' => $request->ID_SEWA_BUS,
            //     'TGL_SEWA' => $request->TGL_SEWA,
            //     'TGL_AKHIR_SEWA' => $request->TGL_AKHIR_SEWA,
            //     'JAM_SEWA' => $request->JAM_SEWA,
            //     'JAM_AKHIR_SEWA' => $request->JAM_AKHIR_SEWA,
            //     'STATUS_ARMADA' => $request->STATUS_ARMADA
            // ]);

        DB::commit();
        }
        Catch (\Exception $ex){
            DB::rollback();
            throw $ex;
        }
             return redirect('sewa_bus')->with('insert','data berhasil di tambah');
    }

    public function getAllSchedule()
    {
        $sewa_bus=DB::table('sewa_bus')
        ->select(
        DB::raw('(ID_CUSTOMER) as title'), 
        DB::raw('(TGL_SEWA_BUS) as start'), 
        DB::raw('(TGL_AKHIR_SEWA) as end'))
        ->get();

        //$data = array_values($sewa_bus);
        return response()->json($sewa_bus);
    }

    public function getScheduleById($id)
    {
        $sewa_bus=DB::table('sewa_bus')->where('ID_SEWA_BUS','=',$id)
        ->select(
        DB::raw('(ID_CUSTOMER) as title'), 
        DB::raw('(TGL_SEWA_BUS) as start'), 
        DB::raw('(TGL_AKHIR_SEWA) as end'))
        ->get();

        //$data = array_values($sewa_bus);
        return response()->json($sewa_bus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function show(sewa_bus $sewa_bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function edit(sewa_bus $sewa_bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('sewa_bus')->where('ID_SEWA_BUS',$request->ID_SEWA_BUS)->update([
                'ID_SEWA_BUS'       => $request->ID_SEWA_BUS,
                'TGL_SEWA_BUS'      => $request->TGL_SEWA,
                'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA,
                'ID_CUSTOMER'       => $request->ID_CUSTOMER,
                'ID_PENGGUNA'       => $request->ID_PENGGUNA,
                'JAM_SEWA'          => $request->JAM_SEWA,
                'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA,
                'STATUS_SEWA'       =>  $request->statussewa
        ]);

        return redirect('sewa_bus');
    }

    public function update_switch(Request $request)
    {
        $sewa_bus=DB::table('sewa_bus')->where('ID_SEWA_BUS',$request->id)->value('STATUS_SEWA','=','1');
        if($sewa_bus){
            DB::table('sewa_bus')
                ->where('ID_SEWA_BUS',$request->id)
                ->update(['STATUS_SEWA'=>0]);
        }
        else{
            DB::table('sewa_bus')
                ->where('ID_SEWA_BUS',$request->id)
                ->update(['STATUS_SEWA'=>1]);
        }
        return redirect('sewa_bus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sewa_bus')->where('ID_SEWA_BUS',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('sewa_bus');
    }

    public function export_excel()
	{
		return Excel::download(new SewaBusExport, 'sewa_bus.xlsx');
    }
    
    public function export_pdf($tgl_awal,$tgl_akhir)
	{

        $laporan_pembayaran=pembayaran::select(['pembayaran.id','pembayaran.ID_SEWA_BUS','pembayaran.TGL_BAYAR', 'pembayaran.JUMLAH_BAYAR',
            'pembayaran.JUMLAH_BAYAR', 'customer.NAMA_CUSTOMER', 'pembayaran.STATUS_BAYAR', 'pembayaran.JENIS_BAYAR',
            'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA', 'sewa_bus_category.DISCOUNT', 'pembayaran.ID_JENIS',
            'sewa_bus.TGL_SEWA_BUS', 'sewa_bus.DP_BUS', 'sewa_bus.total_payment', 'sewa_bus_category.QUANTITY', 'sewa_bus.SISA_SEWA_BUS']) 
            ->join('sewa_bus', 'pembayaran.ID_SEWA_BUS', 'sewa_bus.ID_SEWA_BUS')
            ->join('customer', 'sewa_bus.ID_CUSTOMER', 'customer.ID_CUSTOMER')
            ->join('jenis_bayar', 'pembayaran.ID_JENIS', 'jenis_bayar.ID_JENIS')
            ->join('sewa_bus_category', 'sewa_bus.ID_SEWA_BUS', 'sewa_bus_category.ID_SEWA_BUS')
            ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
            ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
            ->whereBetween('pembayaran.tgl', [$tgl_awal, $tgl_akhir])
            ->orderBy('pembayaran.id', 'ASC')
            ->get();

        $pdf = PDF::loadview('/laporan_sewa_bus',['laporan_pembayaran'=>$laporan_pembayaran,
        'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir])->setPaper('A4');
        
        // $paper = array(0, 0, 51,0236, 107,717);
        //  $pdf->setPaper($paper);
        // $pdf->setPaper($paper,'landscape');
        return $pdf->stream();
	}
}
