<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\pembayaran_paket;
use App\rekening;
use App\customer;
use App\sewa_bus;
use App\sewa_paket_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;
use Redirect;

class PembayaranController extends Controller
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
        $pembayaran=DB::table('pembayaran')
        ->join('sewa_bus', 'pembayaran.ID_SEWA_BUS', 'sewa_bus.ID_SEWA_BUS')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->select('pembayaran.*', 'customer.NAMA_CUSTOMER')
        ->get();


        return view('konfirmasipembayaran', ['pembayaran' =>$pembayaran]);
    }
}

public function indexdetail(Request $request, $id)
    {
            $pembayaran= Pembayaran::find($id);
            $rekening= Rekening::find($pembayaran->ID_REKENING);
            $sewa_bus= Sewa_Bus::find($pembayaran->ID_SEWA_BUS);
            $customer= customer::find($sewa_bus->ID_CUSTOMER);
            // $rekening= Rekening::all();
            // $customer= Customer::all();
            
            // dump($armada);
            return view ('detailbayarbus',['pembayaran' =>$pembayaran, 'rekening' =>$rekening, 
            'customer' =>$customer, 'sewa_bus' =>$sewa_bus]);
}

public function update_switch_bayar(Request $request)
    {
        $pembayaran=DB::table('pembayaran')->where('id',$request->update1)->value('STATUS_BAYAR','=','1');
        if($pembayaran){
            DB::table('pembayaran')
                ->where('id',$request->update1)
                ->update(['STATUS_BAYAR'=>0]);
        }
        else{
            DB::table('pembayaran')
                ->where('id',$request->update1)
                ->update(['STATUS_BAYAR'=>1]);
        }
        return redirect('konfirmasipembayaran');
}

public function cetakKwitansi(){
    $pembayaran=DB::table('pembayaran')
        ->join('sewa_bus', 'pembayaran.ID_SEWA_BUS', 'sewa_bus.ID_SEWA_BUS')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->select('pembayaran.*', 'customer.NAMA_CUSTOMER')
        ->get();

        $customPaper = array(0,0,567.00,283.80);

    	$pdf = PDF::loadview('printbayarbus',['pembayaran'=>$pembayaran])->setPaper($customPaper, 'landscape');
    	return $pdf->stream();
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //================================================================================================================

    public function indexpaket()
    {
        if(!Session::get('login')){
            return redirect('login');
        }
        else{
        $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('sewa_paket_wisata', 'pembayaran_paket.ID_SEWA_PAKET', 'sewa_paket_wisata.ID_SEWA_PAKET')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->select('pembayaran_paket.*', 'customer.NAMA_CUSTOMER')
        ->get();


        return view('konfirmasipembayaran_paket', ['pembayaran_paket' =>$pembayaran_paket]);
        }
    }

    public function paketdetail(Request $request, $id)
    {
            $pembayaran_paket= Pembayaran_Paket::find($id);
            $rekening= Rekening::find($pembayaran_paket->ID_REKENING);
            $sewa_paket_wisata= Sewa_Paket_Wisata::find($pembayaran_paket->ID_SEWA_PAKET);
            $customer= customer::find($sewa_paket_wisata->ID_CUSTOMER);
            // $rekening= Rekening::all();
            // $customer= Customer::all();
            
            // dump($armada);
            return view ('detailbayarpaket',['pembayaran_paket' =>$pembayaran_paket, 'rekening' =>$rekening, 
            'customer' =>$customer, 'sewa_paket_wisata' =>$sewa_paket_wisata]);
}

public function cetakKwitansi_Paket(){
    $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('sewa_paket_wisata', 'pembayaran_paket.ID_SEWA_PAKET', 'sewa_paket_wisata.ID_SEWA_PAKET')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->select('pembayaran_paket.*', 'customer.NAMA_CUSTOMER')
        ->get();

        $customPaper = array(0,0,567.00,283.80);

    	$pdf = PDF::loadview('printbayarpaket',['pembayaran_paket'=>$pembayaran_paket])->setPaper($customPaper, 'landscape');
    	return $pdf->stream();
}

public function update_switch_paket(Request $request)
    {
        $pembayaran_paket=DB::table('pembayaran_paket')->where('id_paket',$request->update1)->value('STATUS_BAYAR','=','1');
        if($pembayaran_paket){
            DB::table('pembayaran_paket')
                ->where('id_paket',$request->update1)
                ->update(['STATUS_BAYAR'=>0]);
        }
        else{
            DB::table('pembayaran_paket')
                ->where('id_paket',$request->update1)
                ->update(['STATUS_BAYAR'=>1]);
        }
        return redirect('konfirmasipembayaran_paket');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_armada = new Category;

        $category_armada->fill([
            'NAMA_CATEGORY'   => $request->namacategory
        ]);

        $category_armada->save();

        return redirect('category_armadaindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('category_armada')->where('ID_CATEGORY',$request->id)->update([
            'NAMA_CATEGORY'   => $request->namacategory
        ]);

        return redirect('category_armadaindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('category_armada')->where('ID_CATEGORY',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('category_armadaindex');
    }

    public function tgl(Request $request)
    {
        // dd($request->all());
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $laporan_pembayaran=pembayaran::select(['pembayaran.id','pembayaran.ID_SEWA_BUS','pembayaran.TGL_BAYAR',
        'pembayaran.JUMLAH_BAYAR', 'customer.NAMA_CUSTOMER', 'pembayaran.STATUS_BAYAR', 'pembayaran.ID_JENIS', 'jenis_bayar.JENIS_BAYAR'])
        ->join('jenis_bayar', 'pembayaran.ID_JENIS', 'jenis_bayar.ID_JENIS')
        ->join('sewa_bus', 'pembayaran.ID_SEWA_BUS', 'sewa_bus.ID_SEWA_BUS')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->whereBetween('pembayaran.tgl', [$tgl_awal, $tgl_akhir])
        ->orderBy('pembayaran.id', 'ASC')
        ->get();

        // dump($laporan);

        return Redirect::back()->with(['laporan'=>$laporan_pembayaran,'laporan_pembayaran'=>$laporan_pembayaran,'tgl_awal'=>$tgl_awal
        ,'tgl_akhir'=>$tgl_akhir]);
        // return redirect('konfirmasipembayaran', ['laporan'=>$laporan]);
        
    }

    public function tgl_paket(Request $request)
    {
        // dd($request->all());
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $laporan_pembayaran=pembayaran_paket::select(['pembayaran_paket.id_paket','pembayaran_paket.ID_SEWA_PAKET','pembayaran_paket.TGL_BAYAR',
        'pembayaran_paket.JUMLAH_BAYAR', 'customer.NAMA_CUSTOMER', 'pembayaran_paket.STATUS_BAYAR', 'pembayaran_paket.JENIS_BAYAR']) 
        ->join('sewa_paket_wisata', 'pembayaran_paket.ID_SEWA_PAKET', 'sewa_paket_wisata.ID_SEWA_PAKET')
        ->join('customer', 'sewa_paket_wisata.ID_CUSTOMER', 'customer.ID_CUSTOMER')
        ->whereBetween('pembayaran_paket.tgl', [$tgl_awal, $tgl_akhir])
        ->orderBy('pembayaran_paket.id_paket', 'ASC')
        ->get();

        // dump($laporan);

        return Redirect::back()->with(['laporan'=>$laporan_pembayaran,'laporan_pembayaran'=>$laporan_pembayaran,'tgl_awal'=>$tgl_awal
        ,'tgl_akhir'=>$tgl_akhir]);
        // return redirect('konfirmasipembayaran', ['laporan'=>$laporan]);
        
    }
}
