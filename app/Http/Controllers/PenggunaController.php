<?php

namespace App\Http\Controllers;

use App\pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use Redirect;

class PenggunaController extends Controller
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
        $pengguna=DB::table('pengguna')->get();



        return view('penggunaindex', ['pengguna' =>$pengguna]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

        $pengguna = new Pengguna;
        $password = md5($request->password);

        
        $pengguna->NAMA_PENGGUNA         = $request->nama;
        $pengguna->EMAIL_PENGGUNA        = $request->email;
        $pengguna->USERNAME              = $request->username;
        $pengguna->TELEPHONE_PENGGUNA    = $request->telephone;
        $pengguna->ALAMAT_PENGGUNA       = $request->alamat;
        $pengguna->PASSWORD              = Hash::make($request->password);
        $pengguna->PERTANYAAN            = $request->pertanyaan;
        $pengguna->JAWABAN               = $request->jawaban;
        $pengguna->JOB_STATUS            = $request->JOB_STATUS;
        $pengguna->FOTO                  = $fileName;
        $file->move(public_path().'/foto_user', $fileName);
        $pengguna->save();
        }

        return redirect('penggunaindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function recovery(Request $request)
    {
        return view ('recovery_pw');
    }

    public function pemulihan(Request $request)
    {
        $pengguna = DB::table('pengguna')->get();

        return view ('pemulihan_pw', ['pengguna' => $pengguna]);
    }

    public function ganti_pw($email)
    {
        $pengguna = DB::table('pengguna')->where('ID_PENGGUNA', '=', $email)
        ->first();

        return view ('ganti_pw', ['pengguna' => $pengguna]);
    }

    public function pertanyaan()
    {
        $pengguna = DB::table('pengguna')->where('EMAIL_PENGGUNA',request()->email)->get();

        return response()->json(['status'=>'success','data'=>$pengguna]);
        // return view ('pemulihan_pw', ['pengguna' => $pengguna]);
    }

    public function pw_update(Request $request)
    {
        $EMAIL_PENGGUNA     = $request->EMAIL_PENGGUNA;
        $PERTANYAAN         = $request->PERTANYAAN;
        $JAWABAN            = $request->JAWABAN;

        // $data = Pengguna::where('EMAIL_PENGGUNA',$EMAIL_PENGGUNA)->first();
        $data = DB::table('pengguna')
        ->where('JAWABAN', '=', $JAWABAN)
        ->first();
        
        if($data){
                return redirect()->route('ganti_pw',$data->ID_PENGGUNA);
        }

        // DB::table('pengguna')->where('ID_PENGGUNA',$request->id)->update([
        //     'EMAIL_PENGGUNA'   => $request->email,
        //     'PASSWORD'         => $request->password
        // ]);

        return view ('login');
    }

    public function sandi_update(Request $request)
    {
        DB::table('pengguna')->where('ID_PENGGUNA',$request->id)->update([
            'PASSWORD'   => Hash::make($request->password)
        ]);
		// alihkan halaman ke halaman customer
		return redirect('login');
    }

    public function profile($id)
    {
        $pengguna = DB::table('pengguna')
        ->where('ID_PENGGUNA',$id)
        ->get();

        return view('profile',['pengguna' => $pengguna]);
    }

    public function profile_update(Request $request)
    {

        DB::table('pengguna')->where('ID_PENGGUNA',$request->id)->update([
            'EMAIL_PENGGUNA'   => $request->email,
            'PASSWORD'         => Hash::make($request->password)
        ]);

        return Redirect::back();
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
		$pengguna = DB::table('pengguna')->where('ID_PENGGUNA',$id)->get();
		// passing data pengguna yang didapat ke view edit.blade.php
		return view('editpengguna',['pengguna' => $pengguna]);
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
        $pengguna = Pengguna::find($request->id);

        $filename=$pengguna->FOTO;
        if($request->hasFile('FOTO')){
            $request->file('FOTO')->move('foto_user/',$request->file('FOTO')->getClientOriginalName());
            $filename=$request->file('FOTO')->getClientOriginalName();
        }

        $pengguna->update([
			'NAMA_PENGGUNA'         => $request->nama,
            'EMAIL_PENGGUNA'        => $request->email,
            'USERNAME'              => $request->username,
            'TELEPHONE_PENGGUNA'    => $request->telephone,
            'ALAMAT_PENGGUNA'       => $request->alamat,
            'PASSWORD'              => Hash::make($request->password),
            'PERTANYAAN'            => $request->pertanyaan,
            'JAWABAN'               => $request->jawaban,
            'JOB_STATUS'            => $request->JOB_STATUS,
            'FOTO'                  => $filename
		]);
		// alihkan halaman ke halaman customer
		return redirect('penggunaindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pengguna')->where('ID_PENGGUNA',$id)->delete();
		
		// alihkan halaman ke halaman pengguna
		return redirect('penggunaindex');
    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $USERNAME       = $request->USERNAME;
        $PASSWORD       = $request->PASSWORD;

        // $data = Pengguna::where('USERNAME',$USERNAME)->first();
        $data = DB::table('pengguna')
        ->where('USERNAME', '=', $USERNAME)
        ->first();
        if($data){
            if(Hash::check($PASSWORD,$data->PASSWORD)){
                $request->session()->put('coba2',$data->ID_PENGGUNA);
                Session::put('coba',$data->NAMA_PENGGUNA);
                Session::put('coba1',$data->JOB_STATUS);
                //Session::put('coba2','USR001');
                //Session::put('coba3', '//foto_user//'+$data->FOTO);
                    Session::put('login', TRUE);
                    if($data->JOB_STATUS == 'Admin'){
                        Session::put('admin', TRUE);
                    }
                    if($data->JOB_STATUS == 'Kasir'){
                        Session::put('kasir', TRUE);
                    }
                    return redirect('ecommerce-dashboard');
                   // return response()->json($data);
            }
            else{
                return redirect('login')->with('salah','salah');
            }
        }
        return redirect('login')->with('salah','salah');
        // return redirect('login')->with('salah');
       //dd($data);
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}
