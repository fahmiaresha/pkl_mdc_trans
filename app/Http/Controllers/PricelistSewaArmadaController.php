<?php

namespace App\Http\Controllers;

use App\Pricelist_Sewa_Armada;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class PricelistSewaArmadaController extends Controller
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
        $sewa_bus_category=DB::table('sewa_bus_category')->get();
        $category_armada = DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')
        ->join('category_armada','pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('category_armada.NAMA_CATEGORY','pricelist_sewa_armada.ID_PRICELIST','pricelist_sewa_armada.TUJUAN_SEWA',
        'pricelist_sewa_armada.PRICELIST_SEWA', 'pricelist_sewa_armada.JUMLAH_HARI')
        ->get();


        return view('pricelistsewaarmada', ['pricelist_sewa_armada' =>$pricelist_sewa_armada, 
        'category_armada' =>$category_armada, 'sewa_bus_category' =>$sewa_bus_category]);
    }
}

    public function index_history()
        {
            if(!Session::get('login')){
                return redirect('login');
            }
            else{
            $sewa_bus_category=DB::table('sewa_bus_category')->get();
            $category_armada = DB::table('category_armada')->get();
            $history_pricelist=DB::table('history_pricelist')
            ->join('category_armada','history_pricelist.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
            ->select('category_armada.NAMA_CATEGORY','history_pricelist.ID_PRICELIST','history_pricelist.TUJUAN_SEWA',
            'history_pricelist.PRICELIST_SEWA', 'history_pricelist.id', 'history_pricelist.TGL_GANTI')
            ->get();

            $history_lama_pricelist=DB::table('history_lama_pricelist')
            ->join('category_armada','history_lama_pricelist.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
            ->select('category_armada.NAMA_CATEGORY','history_lama_pricelist.ID_PRICELIST','history_lama_pricelist.TUJUAN_SEWA',
            'history_lama_pricelist.PRICELIST_SEWA', 'history_lama_pricelist.id', 'history_lama_pricelist.TGL_GANTI')
            ->get();


            return view('history_pricelist', ['history_pricelist' =>$history_pricelist, 'history_lama_pricelist' =>$history_lama_pricelist, 
            'category_armada' =>$category_armada, 'sewa_bus_category' =>$sewa_bus_category]);
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
        $pricelist_sewa_armada = new Pricelist_Sewa_Armada;
        $category_armada = new Category;

        $pricelist_sewa_armada->fill([
            'ID_CATEGORY'       => $request->ID_CATEGORY,
            'TUJUAN_SEWA'       => $request->tujuansewa,
            'PRICELIST_SEWA'    => $request->hargasewa,
        ]);

        $pricelist_sewa_armada->save();

        return redirect('pricelistsewaarmada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pricelist_Sewa_Armada  $pricelist_Sewa_Armada
     * @return \Illuminate\Http\Response
     */
    public function show(Pricelist_Sewa_Armada $pricelist_Sewa_Armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pricelist_Sewa_Armada  $pricelist_Sewa_Armada
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricelist_Sewa_Armada $pricelist_Sewa_Armada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pricelist_Sewa_Armada  $pricelist_Sewa_Armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $x=DB::table('pricelist_sewa_armada')->where('ID_PRICELIST',$request->id)->first();

        DB::table('history_lama_pricelist')->insert([
            'ID_PRICELIST'      => $x->ID_PRICELIST,
            'ID_CATEGORY'       => $x->ID_CATEGORY,
            'TUJUAN_SEWA'       => $x->TUJUAN_SEWA,
            'PRICELIST_SEWA'    => $x->PRICELIST_SEWA,
        ]);

        DB::table('pricelist_sewa_armada')->where('ID_PRICELIST',$request->id)->update([
            'ID_CATEGORY'       => $request->ID_CATEGORY,
            'TUJUAN_SEWA'       => $request->tujuansewa,
            'PRICELIST_SEWA'    => $request->hargasewa,
            'JUMLAH_HARI'       => $request->$jmlhari
        ]);

        DB::table('history_pricelist')->insert([
            'ID_PRICELIST'      => $request->id,
            'ID_CATEGORY'       => $request->ID_CATEGORY,
            'TUJUAN_SEWA'       => $request->tujuansewa,
            'PRICELIST_SEWA'    => $request->hargasewa,
        ]);

        return redirect('pricelistsewaarmada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pricelist_Sewa_Armada  $pricelist_Sewa_Armada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pricelist_sewa_armada')->where('ID_PRICELIST',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('pricelistsewaarmada');
    }
}
