<?php

namespace App\Http\Controllers;

use App\paket_wisata;
use App\armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use\DB;

class PaketWisataController extends Controller
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
        $sewa_paket_wisata = DB::table('sewa_paket_wisata')->get();
        $paket_wisata = DB::table('paket_wisata')->get();

        return view ('paketwisataindex',['paket_wisata' =>$paket_wisata, 'sewa_paket_wisata' =>$sewa_paket_wisata]);
    }
}

    public function indexdetail(Request $request, $id)
    {
            $paket_wisata= Paket_Wisata::find($id);
            // dump($armada);
            return view ('detailindexpaket',['paket_wisata' =>$paket_wisata]);
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
        $paket_wisata = new Paket_Wisata;
        $armada = new Armada;

        $paket_wisata->fill([
            'NAMA_PAKET'            => $request->namapaket,
            // 'TIPE_PAKET'            => $request->tipepaket,
            'HARGA_PAKET'           => $request->hargapaket,
            'HARGA_JUAL'            => $request->hargajual,
            'TEMPAT_KUNJUNG'        => $request->tempatkunjung,
            'FASILITAS_PAKET'       => $request->fasilitas
        ]);

        $paket_wisata->save();

        return redirect('paketwisataindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paket_wisata  $paket_wisata
     * @return \Illuminate\Http\Response
     */
    public function show(paket_wisata $paket_wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paket_wisata  $paket_wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(paket_wisata $paket_wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paket_wisata  $paket_wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paket_wisata $paket_wisata)
    {
        DB::table('paket_wisata')->where('ID_PAKET',$request->id)->update([
            'NAMA_PAKET'            => $request->namapaket,
            'TIPE_PAKET'            => $request->tipepaket,
            'HARGA_PAKET'           => $request->hargapaket,
            'HARGA_JUAL'            => $request->hargajual,
            'TEMPAT_KUNJUNG'        => $request->tempatkunjung,
            'FASILITAS_PAKET'       => $request->fasilitas
        ]);

            return redirect('paketwisataindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paket_wisata  $paket_wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('paketwisata')->where('ID_PAKET',$id)->delete();
		
		// alihkan halaman ke halaman paketwisata
		return redirect('paketwisataindex');
    }
}
