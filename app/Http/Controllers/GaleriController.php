<?php

namespace App\Http\Controllers;

use App\galeri;
use App\armada;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class GaleriController extends Controller
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
        $armada=DB::table('armada')->get();
        $category_armada = DB::table('category_armada')->get();
        $galeri=DB::table('galeri')
        ->join('armada', 'galeri.ID_ARMADA', '=', 'armada.ID_ARMADA')
        ->join('category_armada','armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('galeri.ID_GALERI', 'armada.PLAT_NOMOR', 'galeri.FOTO_ARMADA',
        'galeri.DESKRIPSI_FOTO', 'galeri.STATUS_FOTO', 'category_armada.NAMA_CATEGORY', 'armada.avatar')
        ->get();

        return view('galeriindex', ['galeri' =>$galeri, 'armada' =>$armada, 'category_armada' =>$category_armada]);
        // return view('gallery',compact('galeri','armada'));
    }
}

    public function indexfoto(Request $request, $id)
    {
        if(!Session::get('login')){
            return redirect('login');
        }
        else{
            $armada= Armada::find($id);
            $category_armada= Category::all();
            // dump($armada);
            return view ('fotoarmada',['armada' =>$armada,'category_armada' =>$category_armada]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $armada = DB::table('armada')
        ->join('category_armada','armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->get();

        return view('tambahfoto',['armada' =>$armada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $galeri = new Galeri;

        // $galeri->fill([
        //     'FOTO_ARMADA'       => $request->fotoarmada,
        //     'DESKRIPSI_FOTO'    => $request->deskripsifoto,
        //     'STATUS_FOTO'       => $request->statusfoto
        // ]);

        // $galeri->save();

        // return redirect('galeriindex');

        //  dd($request->all());
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();
        // $hm = $request->hasFile('FOTO_ARMADA');
        // // $namaFile= uniqid() . $hm->getClientOriginalName() . '.' . $hm->getClientOriginalExtension();
        // $namaFile = $hm->getClientOriginalName();
        //     dd($namaFile);
        $galeri = new Galeri;
        $armada = new Armada;

            $galeri->ID_ARMADA          = $request->ID_ARMADA;
            $galeri->DESKRIPSI_FOTO     = $request->DESKRIPSI_FOTO;
            $galeri->STATUS_FOTO        = $request->STATUS_FOTO;
            $galeri->FOTO_ARMADA        = $fileName;
            $file->move(public_path().'/img', $fileName);
            $galeri->save();
        }

        return redirect('galeriindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(galeri $category)
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
        DB::table('galeri')->where('ID_GALERI',$request->id)->update([
            'FOTO_ARMADA'       => $request->fotoarmada,
            'DESKRIPSI_FOTO'    => $request->deskripsifoto,
            'STATUS_FOTO'       => $request->statusfoto
        ]);

        return redirect('galeriindex');
    }

    public function update_switch(Request $request)
    {
        $galeri=DB::table('galeri')->where('ID_GALERI',$request->id)->value('STATUS_FOTO','=','1');
        if($galeri){
            DB::table('galeri')
                ->where('ID_GALERI',$request->id)
                ->update(['STATUS_FOTO'=>0]);
        }
        else{
            DB::table('galeri')
                ->where('ID_GALERI',$request->id)
                ->update(['STATUS_FOTO'=>1]);
        }
        return redirect('galeriindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('galeri')->where('ID_GALERI',$id)->delete();
		
		// alihkan halaman ke halaman galeri
		return redirect('galeriindex');
    }
}
