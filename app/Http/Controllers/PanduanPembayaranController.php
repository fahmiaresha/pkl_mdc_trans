<?php

namespace App\Http\Controllers;

use App\PanduanPembayaran;
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
use App\Pembayaran;
use App\Pembayaran_Paket;
use Illuminate\Http\Request;
use DB;
use Redirect;

class PanduanPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening=DB::table('rekening')->get();

        return view('panduan_pembayaran', ['rekening'=>$rekening]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show_pembayaran()
    {
        $rekening=DB::table('rekening')->get();
        $jenis_bayar=DB::table('jenis_bayar')->get();
        $pembayaran=DB::table('pembayaran')
        ->join('rekening', 'pembayaran.ID_REKENING', 'rekening.ID_REKENING')
        ->join('jenis_bayar', 'pembayaran.ID_JENIS', 'jenis_bayar.ID_JENIS')
        ->select('pembayaran.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING', 'jenis_bayar.ID_JENIS', 'jenis_bayar.JENIS_BAYAR')
        ->get();

        return view('konfirmasi_pembayaran',['pembayaran'=>$pembayaran, 'rekening'=>$rekening, 'jenis_bayar'=>$jenis_bayar]);
    }

    public function show_pembayaran_paket()
    {
        $rekening=DB::table('rekening')->get();
        $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('rekening', 'pembayaran_paket.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran_paket.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();

        return view('konfirmasi_pembayaran_paket',['pembayaran_paket'=>$pembayaran_paket, 'rekening'=>$rekening]);
    }

    public function store_pembayaran(Request $request)
    {
        //dd($request->all());
        // $sewa_bus= Sewa_Bus::find($id);
       
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

            $bayar = new Pembayaran;
                $bayar->CARA_BAYAR            = $request->carabayar;
                $bayar->ID_JENIS              = $request->jenisbayar;
                $bayar->ID_REKENING           = $request->ID_REKENING;
                $bayar->TGL_BAYAR             = $request->tglbayar;
                $bayar->JUMLAH_BAYAR          = $request->jumlahbayar;
                $bayar->ID_SEWA_BUS           = $request->ID_SEWA_BUS;
                $bayar->STATUS_BAYAR          = 1;
                $bayar->NAMA_BANK_PENGIRIM    = $request->namabank;
                $bayar->NOREK_PENGIRIM        = $request->norek;
                $bayar->KETERANGAN            = $request->keterangan;
                $bayar->ATAS_NAMA             = $request->pemilikrekening;
                $bayar->BUKTI_TF              = $fileName;
                $file->move(public_path().'/buktiTF', $fileName);
                

                // $sisa=DB::table('pembayaran')
                // ->join('sewa_bus', 'sewa_bus.ID_SEWA_BUS', '=', 'pembayaran.ID_SEWA_BUS')
                // ->where('pembayaran.ID_SEWA_BUS',$request->ID_SEWA_BUS)
                // ->select('sewa_bus.total_payment')
                // ->get();

                // if($request->jenisbayar==1){
                //     $hasil=$sisa*25/100;
                // }
                // if($request->jenisbayar==2){
                //     $hasil=$sisa;
                // }
                // $bayar->SISA_BAYAR=$hasil;
                $bayar->save();
        }
 
        return Redirect::back()->with('insert','data berhasil di tambah');
    }

    public function nota($id){
        $pembayaran=DB::table('sewa_bus')
        ->join('pembayaran', 'pembayaran.ID_SEWA_BUS', 'sewa_bus.ID_SEWA_BUS')
        ->where('sewa_bus.ID_SEWA_BUS',$id)
        ->select('sewa_bus.*','pembayaran.*')
        //id_sewa_bus,id_jenis
        ->get();

        if($pembayaran==null || $pembayaran=='[]'){
            $pembayaran=DB::table('jenis_bayar')
            ->where('ID_JENIS','=',5)
            ->get();
        }

        return json_encode($pembayaran);
    }

    public function cek_nota($id){
        $pembayaran2=DB::table('sewa_bus')
            ->where('sewa_bus.ID_SEWA_BUS',$id)
            ->get(); // [asdasd] 

        
        if(count($pembayaran2)>0){
            $pembayaran3=DB::table('pembayaran')
                ->where('pembayaran.ID_SEWA_BUS',$id)
                ->where('ID_JENIS','=',2)
                ->get(); //['']
            if(count($pembayaran3)>0){
                $pembayaran2=DB::table('jenis_bayar')
                ->where('ID_JENIS','=',6)
                ->get();
            }
        }
        
        // if($pembayaran2!==null || $pembayaran2==='[]'){
        //     // echo'masuk if 1';
        //     $pembayaran3=DB::table('pembayaran')
        //         ->where('pembayaran.ID_SEWA_BUS',$id)
        //         ->where('ID_JENIS','=',2)
        //         // ->select('ID_JENIS')
        //         ->get(); //['']
        //     if($pembayaran3===null || $pembayaran3==='[]'){
        //         // echo'masuk if 2';
        //         $pembayaran2=DB::table('jenis_bayar')
        //         ->where('ID_JENIS','=',6)
        //         ->get();
        //     }
        // }
            // []
        // $kosong='[]';    

        // if(strpos($pembayaran2,$kosong) ){
        //     // echo'masuk if 1';
        //     $pembayaran3=DB::table('pembayaran')
        //         ->where('pembayaran.ID_SEWA_BUS',$id)
        //         ->orwhere('ID_JENIS','=',2, '&&', 'ID_JENIS', '=', 1)
        //         // ->select('ID_JENIS')
        //         ->get();
        //     if(strpos($pembayaran3,$kosong)){
        //         // echo'masuk if 2';
        //         $pembayaran2=DB::table('jenis_bayar')
        //         ->where('ID_JENIS','=',6)
        //         ->get();
        //     }
        // }
        return json_encode($pembayaran2);
    }

    public function jenis_bayar($id_jenis_bayar,$id_sewa_bus){
        // $hasil=DB::table('pembayaran')
        //         ->where('ID_SEWA_BUS',$id_sewa_bus)
        //         ->select('ID_JENIS','=',1)
        //         ->get();

        // if($hasil!=null || $hasil!='[]'){
        //     $result=DB::table('sewa_bus')
        //     ->where('ID_SEWA_BUS',$id_sewa_bus)
        //     ->select('SISA_SEWA_BUS')
        //     ->get();
        // }

         if($id_jenis_bayar==1){
                $result=DB::table('sewa_bus')
                ->where('ID_SEWA_BUS',$id_sewa_bus)
                ->select('DP_BUS')
                ->get();
        }
         if($id_jenis_bayar==2){
                $result=DB::table('sewa_bus')
                ->where('ID_SEWA_BUS',$id_sewa_bus)
                ->select('SISA_SEWA_BUS')
                ->get();
            }       
        return json_encode($result);
    }

    public function store_pembayaran_paket(Request $request, $id)
    {
        //dd($request->all());
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
       
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

            $bayar_paket = new Pembayaran_Paket;
                $bayar_paket->CARA_BAYAR            = $request->carabayar;
                $bayar_paket->ID_REKENING           = $request->ID_REKENING;
                $bayar_paket->TGL_BAYAR             = $request->tglbayar;
                $bayar_paket->JUMLAH_BAYAR          = $request->jumlahbayar;
                $bayar_paket->ID_SEWA_PAKET         = $id;
                $bayar_paket->STATUS_BAYAR          = 1;
                $bayar_paket->NAMA_BANK_PENGIRIM    = $request->namabank;
                $bayar_paket->NOREK_PENGIRIM        = $request->norek;
                $bayar_paket->KETERANGAN            = $request->keterangan;
                $bayar_paket->ATAS_NAMA             = $request->pemilikrekening;
                $bayar_paket->BUKTI_TF              = $fileName;
                $file->move(public_path().'/buktiTF_Paket', $fileName);
                $bayar_paket->save();
        }
        

        return redirect('invoice_pembayaran_paket');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
