<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\sewa_bus;
use App\pengguna;
use App\customer;
use App\category;
use App\paket_wisata;
use App\sewa_bus_category;
use App\sewa_paket_wisata;
use App\Pricelist_Sewa_Armada;
use App\schedule_armada;
use App\Armada;
use App\rekening;
use App\pembayaran;
use App\Pembayaran_Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;
use Redirect;
use Carbon\Carbon;

class PemesananController extends Controller
{

    public function indexawal()
    {
        //$sewa_bus= Sewa_Bus::all();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.*', 'customer.*', 'pengguna.*')
        ->get();
        
        $customer= customer::all();

        $category_armada=DB::table('category_armada')
        ->get();

        $hari=DB::table('hari')
        ->get();

        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('hari', 'pricelist_sewa_armada.ID_HARI', '=', 'hari.ID_HARI')
        ->join('vw_bus_ready', 'vw_bus_ready.ID_CATEGORY', "=", 'category_armada.ID_CATEGORY')
        ->select('pricelist_sewa_armada.ID_PRICELIST', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'hari.TOTAL_HARI', 
        'pricelist_sewa_armada.PRICELIST_SEWA', 'pricelist_sewa_armada.ID_CATEGORY', 'pricelist_sewa_armada.JUMLAH_HARI', 'vw_bus_ready.jmlbis',
        'pricelist_sewa_armada.ID_HARI')
        ->get();
        
        // dump($pricelist_sewa_armada);

        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL', 'category_armada.NAMA_CATEGORY', 
        'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA', 'sewa_bus.STATUS_SEWA')
        ->get();


        return view('pemesanan_bus', ['sewa_bus' =>$sewa_bus,'customer'=>$customer], 
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada, 'hari'=>$hari]);
    }

    public function indexawal_paket()
    {
        //$sewa_bus= Sewa_Bus::all();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->join('paket_wisata', 'sewa_paket_wisata.ID_PAKET', '=', 'sewa_paket_wisata.ID_PAKET' )
        ->select('sewa_paket_wisata.*', 'customer.*', 'pengguna.*', 'paket_wisata.*','sewa_paket_wisata.ID_PAKET')
        ->get();

        $paket_wisata = DB::table('paket_wisata')->get();


        return view('pemesanan_paket', ['sewa_paket_wisata' =>$sewa_paket_wisata,'paket_wisata'=>$paket_wisata]);
    }


    public function index(Request $request, $id)
    {
        $sewa_bus= Sewa_Bus::find($id);
        $pengguna= Pengguna::find($sewa_bus->ID_PENGGUNA);
        $customer= customer::find($sewa_bus->ID_CUSTOMER);

        $category_armada=DB::table('category_armada')->get();

        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('pricelist_sewa_armada.ID_PRICELIST', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 
        'pricelist_sewa_armada.PRICELIST_SEWA', 'pricelist_sewa_armada.ID_CATEGORY')
        ->get();

        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL', 
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();

        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('pricelist_sewa_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('sewa_bus_category', 'sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->leftjoin('schedule_armada', 'armada.ID_ARMADA', '=', 'schedule_armada.ID_ARMADA','and','schedule_armada.STATUS_ARMADA', '=', 1)
        ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        ->distinct()
        ->get();

        $rekening=DB::table('rekening')->get();
        $pembayaran=DB::table('pembayaran')
        ->join('rekening', 'pembayaran.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();
     

        return view('datatable', ['sewa_bus' =>$sewa_bus,'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 
        'category_armada'=>$category_armada, 'pembayaran'=>$pembayaran, 'armada'=>$armada, 'rekening'=>$rekening]);
   
}

    public function indexpaket(Request $request, $id)
    {
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
        $pengguna= Pengguna::find($sewa_paket_wisata->ID_PENGGUNA);
        $customer= Customer::find($sewa_paket_wisata->ID_CUSTOMER);
        
        $paket_wisata= Paket_Wisata::find($sewa_paket_wisata->ID_PAKET);

        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->leftjoin('schedule_armada', 'armada.ID_ARMADA', '=', 'schedule_armada.ID_ARMADA')
        ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        ->where('schedule_armada.STATUS_ARMADA', '=', 1)
        ->get();

        $rekening=DB::table('rekening')->get();
        $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('rekening', 'pembayaran_paket.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran_paket.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();

        return view('sewa_paket_detail', ['sewa_paket_wisata' =>$sewa_paket_wisata,'pengguna'=>$pengguna,
        'customer'=>$customer,'paket_wisata'=>$paket_wisata, 'armada'=>$armada, 
        'pembayaran_paket'=>$pembayaran_paket, 'rekening'=>$rekening]);
       
}
 
    public function pdf(Request $request)
    {
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.*', 'customer.*', 'pengguna.*')
        ->get();

        $bus=DB::table('view_bus_ready_2')
    ->select('jmlbis')
    ->get();

        $category_armada=DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')->get();
        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();


        return view('front_invoice',['sewa_bus'=>$sewa_bus, 'bus'=>$bus],
        ['sewa_bus_category'=>$sewa_bus_category, 'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    public function cetak_bus(Request $request)
    {
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.*', 'customer.*', 'pengguna.*',DB::raw('addtime(created_at,"1:00:00") as bataswaktu'))
        ->get();

        $category_armada=DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')->get();
        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();

        $pdf = PDF::loadview('/cetak_bus',['sewa_bus'=>$sewa_bus],
        ['sewa_bus_category'=>$sewa_bus_category, 'pricelist_sewa_armada'=>$pricelist_sewa_armada, 
        'category_armada'=>$category_armada])->setPaper('A4');
        
        // $paper = array(0, 0, 51,0236, 107,717);
        //  $pdf->setPaper($paper);
        // $pdf->setPaper($paper,'landscape');
        return $pdf->stream();

    }

    public function pdf_paket(Request $request)
    {
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->join('paket_wisata', 'sewa_paket_wisata.ID_PAKET', '=', 'sewa_paket_wisata.ID_PAKET' )
        ->select('sewa_paket_wisata.*', 'customer.*', 'pengguna.*', 'paket_wisata.*','sewa_paket_wisata.ID_PAKET')
        ->get();


        // $paket_wisata=DB::table('paket_wisata')->get();
        // $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        // ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
        // ->where('ID_SEWA_PAKET', '=', $id)
        // ->select('sewa_paket_wisata.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        // 'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET', 'sewa_paket_wisata.DP_PAKET',
        // 'sewa_paket_wisata.HARGA_SEWA_PAKET','sewa_paket_wisata.JAM_SEWA_PAKET',
        // 'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','paket_wisata.NAMA_PAKET')
        // ->get();

        return view('front_invoice_paket',['sewa_paket_wisata'=>$sewa_paket_wisata]);
    }

    public function cetak_paket(Request $request)
    {
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna', 'sewa_paket_wisata.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->join('paket_wisata', 'sewa_paket_wisata.ID_PAKET', '=', 'sewa_paket_wisata.ID_PAKET' )
        ->select('sewa_paket_wisata.*', 'customer.*', 'pengguna.*', 'paket_wisata.*','sewa_paket_wisata.ID_PAKET')
        ->get();

        $pdf = PDF::loadview('/cetak_paket',['sewa_paket_wisata'=>$sewa_paket_wisata])->setPaper('A4');
        
        // $paper = array(0, 0, 51,0236, 107,717);
        //  $pdf->setPaper($paper);
        // $pdf->setPaper($paper,'landscape');
        return $pdf->stream();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        DB::table('customer')->insert([
            'NAMA_CUSTOMER'   => $request->NAMA_CUSTOMER,
            'EMAIL_CUSTOMER'  => $request->EMAIL_CUSTOMER,
            'TELEPHONE'       => $request->TELEPHONE,
            'ALAMAT'          => $request->ALAMAT
        ]);

        $cus = DB::table('customer')->get();
        foreach($cus as $m){
            $idc = $m->ID_CUSTOMER;
        }
//dd($idc);
        // $peng = DB::table('pengguna')->get();
        // $idp = Session::put($peng->JOB_STATUS);
        // foreach($peng as $idp){
        //     $h = $idp->ID_PENGGUNA;
        // }
        // // $idp = $peng->getId();
        // dd($idp);
        $durasi =  $request['durasi'];
        $tgl_selesai=Carbon::createFromFormat('Y-m-d',$request->TGL_SEWA_BUS)->addDays($durasi);
        DB::table('sewa_bus')->insert([
            'ID_SEWA_BUS'       => $request->ID_SEWA_BUS,
            'TGL_SEWA_BUS'      => $request->TGL_SEWA_BUS,
            'TGL_AKHIR_SEWA'    => $tgl_selesai,
            'ID_PENGGUNA'       => 'USR001',
            'ID_CUSTOMER'       => $idc,
            'EMAIL_CUSTOMER'    => $request->EMAIL_CUSTOMER,
            'SISA_SEWA_BUS'     => $request->HARGA_SEWA_BUS,
            'JAM_SEWA'          => $request->JAM_SEWA,
            // 'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA,
            'DP_BUS'            =>  $request->DP_SEWA,
            'SISA_SEWA_BUS'     =>  $request->SISA_SEWA_BUS,
            'total_payment'     => $request->total_payment,
            'STATUS_SEWA'       => 'Booking'
            
        ]);

        $temp = DB::table('sewa_bus')->get();
        foreach($temp as $s){
            $id = $s->ID_SEWA_BUS;
        }
    
        foreach ($request['id'] as $key) {
            DB::table('sewa_bus_category')->insert([
                'ID_SEWA_BUS'   => $id,
                'ID_PRICELIST'  => $key,
                'QUANTITY'      => $request['qty'][$key],
                'DISCOUNT'      => $request['discount'][$key],
                'TOTAL'         => $request['subtotal'][$key]
            ]);
        }

        // $sewa_bus_category=DB::table('sewa_bus_category')
        //     ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST','=','pricelist_sewa_armada.ID_PRICELIST')
        //     ->join('category_armada','pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        //     ->select('sewa_bus_category.*','pricelist_sewa_armada.TUJUAN_SEWA', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.PRICELIST_SEWA')
        //     ->where('ID_SEWA_BUS', $request->$id)
        //     ->get();


            DB::table('sewa_bus')->where('ID_SEWA_BUS',$id)->update([
                'DP_BUS'        => $request->dpbus,
                'SISA_SEWA_BUS' => $request->sisa,
                'total_payment' => $request->sub
        ]);
            
        // dump($id);

    $bus=DB::table('sewa_bus_category')
    ->where('ID_SEWA_BUS', '=', $id)
    ->first();

    // dump($bus);
     //return redirect('pemesanan', ['sewa_bus_category'=>$sewa_bus_category]);     
    //  return view('front_invoice',['bus'=>$bus])
     return Redirect::to('front_invoice')->with(['succes' => 'Alread Apply for this post','bus'=>$bus]);  
       //return redirect('invoice');       
    }

    public function store_paket(Request $request)
    {
        DB::table('customer')->insert([
            'NAMA_CUSTOMER'   => $request->NAMA_CUSTOMER,
            'EMAIL_CUSTOMER'  => $request->EMAIL_CUSTOMER,
            'TELEPHONE'       => $request->TELEPHONE,
            'ALAMAT'          => $request->ALAMAT
        ]);

        $cus1 = DB::table('customer')->get();
        foreach($cus1 as $m1){
            $idc1 = $m1->ID_CUSTOMER;
        }

        // foreach ($request['id'] as $key) {
        //     $t= DB::table('sewa_paket_wisata')->insert([
        //         'ID_PAKET'      => $key
        //         ]);
        //     }

            // DB::table('sewa_paket_wisata')->insert([
            //     'TGL_SEWA_PAKET'        => $request->TGL_SEWA_PAKET,
            //     'TGL_AKHIR_SEWA_PAKET'  => $request->TGL_AKHIR_SEWA_PAKET,
            //     // 'ID_PAKET'              => $t,
            //     'ID_CUSTOMER'           => $idc1,
            //     'ID_PENGGUNA'           => 'USR001',
            //     'JAM_SEWA_PAKET'        => $request->JAM_SEWA_PAKET,
            //     'JAM_AKHIR_SEWA_PAKET'  => $request->JAM_AKHIR_SEWA_PAKET,
            //     'DP_PAKET'              => $request->DP_PAKET,
            //     'SISA_SEWA_PAKET'       => $request->SISA_SEWA_PAKET,
            //     'STATUS_PAKET_WISATA'   => 'Booking'
            //     ]);

            foreach ($request['id'] as $key) {
                DB::table('sewa_paket_wisata')->insert([
                    'TGL_SEWA_PAKET'        => $request->TGL_SEWA_PAKET,
                    // 'TGL_AKHIR_SEWA_PAKET'  => $request->TGL_AKHIR_SEWA_PAKET,
                    // 'ID_PAKET'              => $t,
                    'ID_CUSTOMER'           => $idc1,
                    'ID_PENGGUNA'           => 'USR001',
                    // 'JAM_SEWA_PAKET'        => $request->JAM_SEWA_PAKET,
                    // 'JAM_AKHIR_SEWA_PAKET'  => $request->JAM_AKHIR_SEWA_PAKET,
                    'DP_PAKET'              => $request->dpbus,
                    'SISA_SEWA_PAKET'       => $request->sisa,
                    'STATUS_PAKET_WISATA'   => 'Booking',
                    'ID_PAKET'              => $key,
                    'QUANTITY'              => $request['qty'][$key],
                    'DISCOUNT'              => $request['discount'][$key],
                    'TOTAL'                 => $request['subtotal'][$key]
                ]);
            }

            //return Redirect::to('invoice_paket')->with(['id'=>$id,'succes' => 'Alread Apply for this post']);  
             return redirect('frontinvoice_paket');
    }

    public function cetak_pdf($id)
    {
    	$customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        'sewa_bus.TGL_AKHIR_SEWA','sewa_bus.LAMA_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        'sewa_bus.HARGA_SEWA_BUS','sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA')
        ->get();

    	// $pdf = PDF::loadview('invoice',['sewa_bus'=>$sewa_bus]);
        // return $pdf->stream();
        // $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('pegawai_pdf',['sewa_bus' =>$sewa_bus,'ID_SEWA_BUS'=>$ID_SEWA_BUS,'customer'=>$customer,'pengguna'=>$pengguna]);
    	return $pdf->download('laporan-sewa_bus-pdf');
    }


    // public function getTujuan(){
    //     $tmp = DB::table('pricelist_sewa_armada')
    //     ->get();

    //     return response()->json(['status'=>'success','data'=>$tmp]);
    // }

    public function getHari(){
        // $x = DB::table('pricelist_sewa_armada')
        // ->where('ID_CATEGORY', '=', '')
        // if($){

        // }

        $har = DB::table('pricelist_sewa_armada')
        ->where('ID_CATEGORY', request()->days)
        ->distinct()
        ->get();

        return response()->json(['status'=>'success','data'=>$har]);
    }

    public function getTujuan(){
        $tmp = DB::table('pricelist_sewa_armada')
        ->where('ID_CATEGORY', request()->category)
        ->get();

        return response()->json(['status'=>'success','data'=>$tmp]);
    }

    public function getTujuanByFilter(){
        $x = DB::table('vw_listallschedule')
        ->where('TGL_SEWA', '>=', request()->tgl)
        ->where('TGL_AKHIR_SEWA', '<=', request()->tgl)
        ->where('ID_CATEGORY', '=', request()->cat1)
        ->where('STATUS_ARMADA','=', 0)
        ->select('vw_listallschedule.ID_PRICELIST',DB::raw('count(vw_listallschedule.ID_PRICELIST) as jml'))
        ->get();
        $array = json_decode(json_encode($x),true);

        $y = DB::table('pricelist_sewa_armada')
        ->join('vw_bus_ready_4', 'vw_bus_ready_4.ID_CATEGORY', '=', 'pricelist_sewa_armada.ID_CATEGORY')
         ->where('vw_bus_ready_4.jmlbis','>',$array[0]['jml'])
        // ->orWhereNotIn('ID_PRICELIST', $array)
        ->Where('TUJUAN_SEWA',  '=', request()->tuj)
        ->Where('pricelist_sewa_armada.ID_CATEGORY',  '=', request()->cat1)
       ->select(DB::raw('*'))
        ->get();

        return response()->json(['status'=>'success','data'=>$y]);
    }
}
