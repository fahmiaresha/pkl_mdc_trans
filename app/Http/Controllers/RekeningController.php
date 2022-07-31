<?php

namespace App\Http\Controllers;

use App\rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class RekeningController extends Controller
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
        $rekening=DB::table('rekening')->get();


        return view('rekening', ['rekening' =>$rekening]);
    }
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
        $rekening = new Rekening;

        $rekening->fill([
            'NAMA_BANK'         => $request->namabank,
            'NOMOR_REKENING'    => $request->norek,
            'ATAS_NAMA'         => $request->atasnama
        ]);

        $rekening->save();

        return redirect('rekening');
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
        DB::table('rekening')->where('ID_REKENING',$request->id)->update([
            'NAMA_BANK'         => $request->namabank,
            'NOMOR_REKENING'    => $request->norek,
            'ATAS_NAMA'         => $request->atasnama
        ]);

        return redirect('rekening');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rekening')->where('ID_REKENING',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('rekening');
    }
}
