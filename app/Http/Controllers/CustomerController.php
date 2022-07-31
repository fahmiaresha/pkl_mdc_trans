<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class CustomerController extends Controller
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
        $customer=DB::table('customer')->get();
        $sewa_bus=DB::table('sewa_bus')->get();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')->get();



        return view('customerindex', ['customer' =>$customer, 'sewa_bus' =>$sewa_bus, 'sewa_paket_wisata' =>$sewa_paket_wisata]);
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
        // DB::table('customer')->insert([
        //     'NAMA_CUSTOMER'   => $request->nama,
        //     'EMAIL'           => $request->email,
        //     'TELEPHONE'       => $request->telephone,
        //     'ALAMAT'          => $request->alamat
        //      ]);
     
        // return redirect('customerindex');
        $customer = new Customer;

        $customer->fill([
            'NAMA_CUSTOMER'   => $request->nama,
            'EMAIL_CUSTOMER'  => $request->email,
            'TELEPHONE'       => $request->telephone,
            'ALAMAT'          => $request->alamat
        ]);

        $customer->save();

        return redirect('customerindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data customer berdasarkan id yang dipilih
		$customer = DB::table('customer')->where('ID_CUSTOMER',$id)->get();
		// passing data customer yang didapat ke view edit.blade.php
		return view('customerindex',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('customer')->where('ID_CUSTOMER',$request->id)->update([
			'NAMA_CUSTOMER'   => $request->nama,
            'EMAIL_CUSTOMER'  => $request->email,
            'TELEPHONE'       => $request->telephone,
            'ALAMAT'          => $request->alamat
		]);
		// alihkan halaman ke halaman customer
		return redirect('customerindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('customer')->where('ID_CUSTOMER',$id)->delete();
		
		// alihkan halaman ke halaman customer
		return redirect('customerindex');
    }
}
