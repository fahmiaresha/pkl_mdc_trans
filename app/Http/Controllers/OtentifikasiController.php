<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtentifikasiController extends Controller
{
    public function index(){
        // if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
        //     echo"<script>alert('15 Minutes over!');</script>";
        //     unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
        //     $_SESSION['logged_in'] = false;
        //     // header("Location: " . index.php); //redirect to index.php
        //     return view('login');
        //     exit;
        // } else {
        //     $_SESSION['timestamp'] = time(); //set new timestamp
        // }
        return view('login');
    }

    public function login(Request $request){
        // dd($request->all());
        return view('ecommerce-dashboard');
    }
}
