<?php

namespace App\Http\Controllers;

use App\schedule;
use App\sewa_bus;
use App\pengguna;
use App\customer;
use App\category;
use App\paket_wisata;
use App\sewa_bus_category;
use App\sewa_paket_wisata;
use App\Pricelist_Sewa_Armada;
use App\Armada;
use App\rekening;
use App\pembayaran;
use App\Pembayaran_Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class ScheduleController extends Controller
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
        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('category_armada.NAMA_CATEGORY', 'armada.PLAT_NOMOR', 'armada.ID_ARMADA', 'armada.STATUS_ARMADA')
        ->get();


        $customer=DB::table('customer')->get();

        $sewa_bus=DB::table('sewa_bus')
        ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->get();


        $schedule_armada=DB::table('schedule_armada')
        ->join('armada','schedule_armada.ID_ARMADA', '=', 'armada.ID_ARMADA')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('category_armada.NAMA_CATEGORY', 'armada.PLAT_NOMOR', 'armada.ID_ARMADA', 'armada.STATUS_ARMADA')
        ->where('schedule_armada.STATUS_ARMADA', '=', 0)
        ->orWhere('armada.STATUS_ARMADA', '=', 1)
        ->distinct()->get();

        // $sb=DB::table('schedule_armada')
        // ->join('sewa_bus','schedule_armada.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        // ->join('customer', 'sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        // ->get();


        
        return view('scheduleindex',['schedule_armada'=> $schedule_armada,
        'armada'=>$armada, 'sewa_bus'=>$sewa_bus, 'customer'=>$customer]);
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
            DB::table('schedule_armada')->insert([
                'ID_SCHEDULE'       => $request->ID_SCHEDULE,
                'TGL_SEWA'          => $request->TGL_SEWA,
                'TGL_AKHIR_SEWA'    => $request->TGL_AKHIR_SEWA,
                'LAMA_SEWA'         => $request->LAMA_SEWA,
                'ID_ARMADA'         => $request->ID_ARMADA,
                'ID_SEWA_BUS'       => $request->ID_SEWA_BUS,
                'ID_SEWA_PAKET'     => $request->ID_SEWA_PAKET,
                'HARGA_SEWA_BUS'    => $request->HARGA_SEWA_BUS,
                'STATUS_SEWA'       => 1,
                'JAM_SEWA'          => $request->JAM_SEWA,
                'JAM_AKHIR_SEWA'    => $request->JAM_AKHIR_SEWA
            ]);

            

        DB::commit();
        }
        Catch (\Exception $ex){
            DB::rollback();
            throw $ex;
        }
             return redirect('scheduleindex')->with('insert','data berhasil di tambah');
    }

    public function getAllSchedule()
    {
        $schedule_armada=DB::table('schedule_armada')
        ->select(
        DB::raw('(ID_ARMADA) as title'), 
        DB::raw('(TGL_SEWA) as start'), 
        DB::raw('(TGL_AKHIR_SEWA) as end'))
        ->get();

        //$data = array_values($sewa_bus);
        return response()->json($schedule_armada);
    }

    public function getScheduleById($id)
    {
        $schedule_armada=DB::table('schedule_armada')->where('ID_SCHEDULE','=',$id)
        ->select(
        DB::raw('(ID_ARMADA) as title'), 
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
    public function update(Request $request)
    {
        DB::table('schedule_armada')->where('ID_SCHEDULE',$request->ID_SCHEDULE)->update([
            'STATUS_ARMADA'     => 1
        ]);

        return redirect('scheduleindex');
    }

    public function update_switch(Request $request)
    {
        $schedule_armada=DB::table('schedule_armada')->where('ID_SCHEDULE',$request->STATUS_ARMADA)->value('STATUS_ARMADA','=','0');
        if($schedule_armada){
            DB::table('schedule_armada')
                ->where('ID_SCHEDULE',$request->STATUS_ARMADA)
                ->update(['STATUS_ARMADA'=>1]);
        }
        else{
            DB::table('schedule_armada')
                ->where('ID_SCHEDULE',$request->STATUS_ARMADA)
                ->update(['STATUS_ARMADA'=>0]);
        }
        return redirect('scheduleindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sewa_bus  $sewa_bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(sewa_bus $sewa_bus)
    {
        //
    }
}
