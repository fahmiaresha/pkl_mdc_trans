<?php

namespace App\Http\Controllers;

use App\sewa_paket_wisata;
use App\rekening;
use App\pembayaran_paket;
use App\paket_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Exports\SewaPaketExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SewaPaketController extends Controller
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
        $paket_wisata=DB::table('paket_wisata')->get();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('customer','sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
        ->select('sewa_paket_wisata.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET','customer.NAMA_CUSTOMER', 'sewa_paket_wisata.DP_PAKET',
        'sewa_paket_wisata.SISA_SEWA_PAKET','sewa_paket_wisata.JAM_SEWA_PAKET',
        'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','pengguna.NAMA_PENGGUNA','paket_wisata.NAMA_PAKET', 'sewa_paket_wisata.STATUS_PAKET_WISATA')
        ->get();

        
        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->leftjoin('schedule_armada', 'armada.ID_ARMADA', '=', 'schedule_armada.ID_ARMADA')
        ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        ->where('schedule_armada.STATUS_ARMADA', '=', 1)
        ->get();
        
        // $x = DB::table('vw_listallschedule')
        // ->where('TGL_SEWA', '>=', 'sewa_paket_wisata.TGL_SEWA_PAKET')
        // ->where('TGL_AKHIR_SEWA', '<=', 'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET')
        // ->where('STATUS_ARMADA','=', 0)
        // ->select('vw_listallschedule.ID_ARMADA')
        // ->get();
        // $array = json_decode(json_encode($x),true);

        // $armada=DB::table('armada')
        // ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        // ->join('paket_wisata',  'paket_wisata.ID_CATEGORY', '=', 'armada.ID_CATEGORY')
        // ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        // ->where( 'paket_wisata.ID_PAKET','=', 'sewa_paket_wisata.ID_PAKET')
        // ->where('armada.STATUS_ARMADA','=',1)
        // ->whereNotIn('ID_ARMADA', $array)
        // ->get();

        

        return view('sewa_paket', ['sewa_paket_wisata' =>$sewa_paket_wisata,'customer'=>$customer,'pengguna'=>$pengguna,
        'paket_wisata'=>$paket_wisata, 'armada'=>$armada, 'schedule_armada'=>$schedule_armada]);
    }
}

    public function generateSewa(){

        $idsewa="INV2020110101";
        return $idsewa;
    }

    public function getAllSchedule()
    {
        $schedule_armada=DB::table('vw_tampil_schedule')
        // ->join('armada', 'schedule_armada.ID_ARMADA', '=', 'armada.ID_ARMADA')
        // ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        // ->join('sewa_bus','schedule_armada.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        // ->join('sewa_bus_category','sewa_bus.ID_SEWA_BUS', '=', 'sewa_bus_category.ID_SEWA_BUS')
        // ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        // ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        // ->select('customer.NAMA_CUSTOMER', 'pricelist_sewa_armada.TUJUAN_SEWA', 'schedule_armada.ID_SCHEDULE',
        // DB::raw('(armada.PLAT_NOMOR) as title'), 
        // DB::raw('(schedule_armada.TGL_SEWA) as start'), 
        // DB::raw('(schedule_armada.TGL_AKHIR_SEWA) as end'),
        // DB::raw('case when schedule_armada.STATUS_ARMADA=1 then "Selesai" else "On Schedule" end as STATUS_ARMADA'),
        // DB::raw('case when schedule_armada.STATUS_ARMADA=1 then "bg-danger" else "bg-primary" end as className'),)
        ->get();


        //$data = array_values($sewa_bus);
        return response()->json($schedule_armada);
    }

    public function getScheduleById($id)
    {
        $schedule_armada=DB::table('schedule_armada')->where('ID_SCHEDULE','=',$id)
        ->join('armada', 'schedule_armada.ID_ARMADA', '=', 'armada.ID_ARMADA')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('sewa_bus','schedule_armada.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->select('customer.NAMA_CUSTOMER',
        DB::raw('(armada.PLAT_NOMOR) as title'), 
        DB::raw('(schedule_armada.TGL_SEWA) as start'), 
        DB::raw('(schedule_armada.TGL_AKHIR_SEWA) as end'))
        ->get();

        //$data = array_values($sewa_bus);
        return response()->json($schedule_armada);
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
            DB::table('sewa_paket_wisata')->insert([
                'TGL_SEWA_PAKET'        => $request->TGL_SEWA_PAKET,
                'TGL_AKHIR_SEWA_PAKET'  => $request->TGL_AKHIR_SEWA_PAKET,
                'ID_PAKET'              => $request->ID_PAKET,
                'ID_CUSTOMER'           => $request->ID_CUSTOMER,
                'ID_PENGGUNA'           => $request->ID_PENGGUNA,
                'JAM_SEWA_PAKET'        => $request->JAM_SEWA_PAKET,
                'JAM_AKHIR_SEWA_PAKET'  => $request->JAM_AKHIR_SEWA_PAKET,
                'DP_PAKET'              => $request->DP_PAKET,
                'SISA_SEWA_PAKET'       => $request->SISA_SEWA_PAKET,
                'STATUS_PAKET_WISATA'   =>  $request->STATUS_PAKET_WISATA
            ]);

            // DB::table('schedule_armada')->insert([
            //     'ID_SEWA_PAKET'     => $request->ID_SEWA_PAKET,
            //     'ID_ARMADA'         => $request->ID_ARMADA,
            //     'TGL_SEWA'          => $request->TGL_SEWA_PAKET,
            //     'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA_PAKET,
            //     'JAM_SEWA'          => $request->JAM_SEWA_PAKET,
            //     'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA_PAKET,
            //     'STATUS_ARMADA'     => 0,
            // ]);

             return redirect('sewa_paket')->with('insert','data berhasil di tambah');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  \App\sewa_PAKET  $sewa_PAKET
     * @return \Illuminate\Http\Response
     */
    public function show(sewa_PAKET $sewa_PAKET)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sewa_PAKET  $sewa_PAKET
     * @return \Illuminate\Http\Response
     */
    public function edit(sewa_PAKET $sewa_PAKET)
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
        DB::table('sewa_paket_wisata')->where('ID_SEWA_PAKET',$request->ID_SEWA_PAKET)->update([
                'ID_SEWA_PAKET'         => $request->ID_SEWA_PAKET,
                'TGL_SEWA_PAKET'        => $request->TGL_SEWA_PAKET,
                'TGL_AKHIR_SEWA_PAKET'  => $request->TGL_AKHIR_SEWA_PAKET,
                'ID_PAKET'              => $request->ID_PAKET,
                'ID_CUSTOMER'           => $request->ID_CUSTOMER,
                'ID_PENGGUNA'           => $request->ID_PENGGUNA,
                'JAM_SEWA_PAKET'        => $request->JAM_SEWA_PAKET,
                'JAM_AKHIR_SEWA_PAKET'  => $request->JAM_AKHIR_SEWA_PAKET,
                'STATUS_PAKET_WISATA'   => $request->STATUS_PAKET_WISATA,
                'JAM_AKHIR_SEWA_PAKET'  => $request->JAM_AKHIR_SEWA_PAKET,
                'DP_PAKET'              => $request->dp,
                'SISA_SEWA_PAKET'       => $request->sisabayar
                // 'DP_PAKET'              =>  $request->DP_PAKET
        ]);

        DB::table('schedule_armada')->where('ID_SEWA_PAKET',$request->ID_SEWA_PAKET)->delete();

        DB::table('schedule_armada')->insert([
            'ID_SEWA_PAKET'     => $request->ID_SEWA_PAKET,
            'ID_ARMADA'         => $request->ID_ARMADA,
            'TGL_SEWA'          => $request->TGL_SEWA_PAKET,
            'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA_PAKET,
            'JAM_SEWA'          => $request->JAM_SEWA_PAKET,
            'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA_PAKET,
            'STATUS_ARMADA'     => 0,
        ]);

        // DB::table('schedule_armada')->where('ID_SEWA_PAKET',$request->ID_SEWA_PAKET)->update([
        //     'TGL_SEWA'          => $request->TGL_SEWA,
        //     'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA,
        //     'JAM_SEWA'          => $request->JAM_SEWA,
        //     'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA
        // ]);


        return redirect('sewa_paket');
    }

    public function update_switch(Request $request)
    {
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')->where('ID_SEWA_PAKET',$request->id)->value('STATUS_SEWA','=','1');
        if($sewa_paket_wisata){
            DB::table('sewa_paket_wisata')
                ->where('ID_SEWA_PAKET',$request->id)
                ->update(['STATUS_SEWA'=>0]);
        }
        else{
            DB::table('sewa_paket_wisata')
                ->where('ID_SEWA_PAKET',$request->id)
                ->update(['STATUS_SEWA'=>1]);
        }
        return redirect('sewa_paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sewa_paket_wisata')->where('ID_SEWA_PAKET',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('sewa_paket');
    }

    public function pdf_paket(Request $request)
    {
        $customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $paket_wisata=DB::table('paket_wisata')->get();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('customer','sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
        ->select('sewa_paket_wisata.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET','customer.NAMA_CUSTOMER', 'sewa_paket_wisata.DP_PAKET',
        'sewa_paket_wisata.HARGA_SEWA_PAKET','sewa_paket_wisata.JAM_SEWA_PAKET',
        'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','pengguna.NAMA_PENGGUNA','paket_wisata.NAMA_PAKET')
        ->get();

        return view('invoicepaket', ['sewa_paket_wisata' =>$sewa_paket_wisata,
        'customer'=>$customer,'pengguna'=>$pengguna,'paket_wisata'=>$paket_wisata]);
    }

    public function export_excel()
	{
		return Excel::download(new SewaPaketExport, 'sewa_paket.xlsx');
    }
    
    public function export_pdf($tgl_awal,$tgl_akhir)
	{

        $laporan_pembayaran=pembayaran_paket::select(['pembayaran_paket.id_paket','pembayaran_paket.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET','customer.NAMA_CUSTOMER','sewa_paket_wisata.JAM_SEWA_PAKET', 'sewa_paket_wisata.SISA_SEWA_PAKET',
        'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','pengguna.NAMA_PENGGUNA','paket_wisata.NAMA_PAKET', 'pembayaran_paket.JENIS_BAYAR', 'pembayaran_paket.JUMLAH_BAYAR'
        ,'sewa_paket_wisata.DP_PAKET','sewa_paket_wisata.SISA_SEWA_PAKET','paket_wisata.HARGA_PAKET','paket_wisata.HARGA_JUAL']) 
            ->join('sewa_paket_wisata', 'pembayaran_paket.ID_SEWA_PAKET', 'sewa_paket_wisata.ID_SEWA_PAKET')
            ->join('customer','sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
            ->join('pengguna','sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
            ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
            ->whereBetween('pembayaran_paket.tgl', [$tgl_awal, $tgl_akhir])
            ->orderBy('pembayaran_paket.id_paket', 'ASC')
            ->get();

        $pdf = PDF::loadview('/laporan_sewa_paket',['laporan_pembayaran'=>$laporan_pembayaran,
        'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir])->setPaper('A4');

        return $pdf->stream();
	}
}
