<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class CategoryController extends Controller
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
        $armada = DB::table('armada')->get();
        $category_armada=DB::table('category_armada')->get();


        return view('category_armadaindex', ['category_armada' =>$category_armada, 'armada' =>$armada]);
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
}
