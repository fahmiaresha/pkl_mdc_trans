<?php

namespace App\Http\Controllers;

use App\armada;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class ArmadaController extends Controller
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
        $schedule_armada = DB::table('schedule_armada')->get();
        $category_armada = DB::table('category_armada')->get();
        $armada = DB::table('armada')
        ->join('category_armada','armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('category_armada.NAMA_CATEGORY','armada.ID_ARMADA','armada.NAMA_ARMADA',
        'armada.PLAT_NOMOR', 'armada.KAPASITAS', 'armada.FASILITAS_ARMADA','armada.HARGA','armada.avatar','armada.STATUS_ARMADA')
        ->get();
        // dump($armada);
        return view ('armadaindex',['armada' =>$armada,'category_armada' =>$category_armada], ['schedule_armada'=>$schedule_armada]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_armada = DB::table('category_armada')->get();

        return view('createarmada',['category_armada' =>$category_armada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $armada = new Armada;
        // $category_armada = new Category;

        // $armada->fill([
        //     'ID_CATEGORY'           => $request->ID_CATEGORY,
        //     'NAMA_ARMADA'           => $request->namaarmada,
        //     'PLAT_NOMOR'            => $request->platnomor,
        //     'KAPASITAS'             => $request->kapasitas,
        //     'FASILITAS_ARMADA'      => $request->fasilitas,
        //     'HARGA'                 => $request->harga,
        //     'avatar'                  => $request->avatar,
        //     'STATUS_ARMADA'         => $request->status
        // ]);
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

        $ar = new Armada;
        $category_armada = new Category;

            $ar->ID_CATEGORY        = $request->ID_CATEGORY;
            $ar->NAMA_ARMADA        = $request->namaarmada;
            $ar->PLAT_NOMOR         = $request->platnomor;
            $ar->KAPASITAS          = $request->kapasitas;
            $ar->FASILITAS_ARMADA   = $request->fasilitas;
            $ar->HARGA              = $request->harga;
            $ar->avatar             = $fileName;
            $file->move(public_path().'/foto', $fileName);
            $ar->save();
        }
        return redirect('armadaindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(armada $armada)
    {
          // dd($request->all());
        // DB::table('armada')->where('ID_ARMADA',$request->id)->update([
		// 	'ID_CATEGORY'           => $request->ID_CATEGORY,
        //     'NAMA_ARMADA'           => $request->namaarmada,
        //     'PLAT_NOMOR'            => $request->platnomor,
        //     'KAPASITAS'             => $request->kapasitas,
        //     'FASILITAS_ARMADA'      => $request->fasilitas,
        //     'HARGA'                 => $request->harga,
        //     'FOTO'                  => $request->foto,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_armada = DB::table('category_armada')->get();
        $armada = DB::table('armada')->where('ID_ARMADA',$id)->get();
        
		// passing data categories yang didapat ke view edit.blade.php
		return view('editarmada',['armada' =>$armada,'category_armada' =>$category_armada]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //  dd($request->all());
         $armada = Armada::find($request->id);
        // $category_armada = new Category;
        // $category = Category::find($category_armada->ID_CATEGORY);
        // $armada->update($request->all());
        
        // DB::table('armada')->where('ID_ARMADA',$request->id)->update([
        //     	'ID_CATEGORY'           => $request->ID_CATEGORY,
        //         'NAMA_ARMADA'           => $request->namaarmada,
        //         'PLAT_NOMOR'            => $request->platnomor,
        //         'KAPASITAS'             => $request->kapasitas,
        //         'FASILITAS_ARMADA'      => $request->fasilitas,
        //         'avatar'                => $request->file
        //         ]);
        $filename=$armada->avatar;
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('foto/',$request->file('avatar')->getClientOriginalName());
            $filename=$request->file('avatar')->getClientOriginalName();
          
            // $armada->update($armada);
        }

        $armada->update([
                'ID_CATEGORY'           => $request->ID_CATEGORY,
                'NAMA_ARMADA'           => $request->namaarmada,
                'PLAT_NOMOR'            => $request->platnomor,
                'KAPASITAS'             => $request->kapasitas,
                'FASILITAS_ARMADA'      => $request->fasilitas,
                'avatar'                => $filename
        ]);
		// alihkan halaman ke halaman armada
        return redirect('armadaindex');
        
    }

    public function update_switch(Request $request)
    {
        $armada=DB::table('armada')->where('ID_ARMADA',$request->id)->value('STATUS_ARMADA','=','1');
        if($armada){
            DB::table('armada')
                ->where('ID_ARMADA',$request->id)
                ->update(['STATUS_ARMADA'=>0]);
        }
        else{
            DB::table('armada')
                ->where('ID_ARMADA',$request->id)
                ->update(['STATUS_ARMADA'=>1]);
        }
        return redirect('armadaindex');
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('armada')->where('ID_ARMADA',$id)->delete();
		
		// alihkan halaman ke halaman armada
		return redirect('armadaindex');
    }
}
