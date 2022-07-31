<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table = 'pembayaran';
    
    protected $fillable = 
    [
            'CARA_BAYAR',            
            'ID_REKENING' ,           
            'TGL_BAYAR'   ,          
            'JUMLAH_BAYAR' ,        
            'ID_SEWA_BUS'   ,       
            'STATUS_BAYAR'   ,     
            'NAMA_BANK_PENGIRIM',   
            'NOREK_PENGIRIM'     ,   
            'KETERANGAN'          , 
            'BUKTI_TF'             ,
            'ATAS_NAMA'             
    ];
}
