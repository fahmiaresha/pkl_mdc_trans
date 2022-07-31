<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index(){
        return view('recovery_pw');
    }
    public function send(Request $request){
        try{
            Mail::send('isiemail', array('pesan' => $request->pesan) , function($pesan) use($request){
                $pesan->to($request->penerima,'Verifikasi')->subject('Verifikasi Email');
                $pesan->from(env('MAIL_USERNAME','dwihanum55@gmail.com'),'Verifikasi Akun email anda');
            });
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    // public function send(Request $request){
    //     $email = "hanumkenum04@gmail.com";
    //     Mail::send('isiemail', function($message) use ($email) {
    //         $message->to($email);
    //     });
    // }
}
