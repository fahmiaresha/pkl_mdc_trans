<?php

namespace App\Http\Controllers;

use App\testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class TestimonyController extends Controller
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
        
        $testimony=DB::table('testimony')->get();


        return view('testimony', ['testimony' =>$testimony]);
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
        $testimony = new testimony;

        $testimony->fill([
            'NAMA_TESTI'   => $request->NAMA_TESTI,
            'TESTIMONY'    => $request->TESTIMONY
        ]);

        $testimony->save();

        return redirect('testimony');
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
        DB::table('testimony')->where('ID_TESTI',$request->id)->update([
            'NAMA_TESTI'   => $request->NAMA_TESTI,
            'TESTIMONY'    => $request->TESTIMONY
        ]);

        return redirect('testimony');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('testimony')->where('ID_TESTI',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('testimony');
    }

    public function update_switch(Request $request)
    {
        $testimony=DB::table('testimony')->where('ID_TESTI',$request->testi)->value('STATUS','=','1');
        if($testimony){
            DB::table('testimony')
                ->where('ID_TESTI',$request->testi)
                ->update(['STATUS'=>0]);
        }
        else{
            DB::table('testimony')
                ->where('ID_TESTI',$request->testi)
                ->update(['STATUS'=>1]);
        }
        return redirect('testimony');
    }
}
