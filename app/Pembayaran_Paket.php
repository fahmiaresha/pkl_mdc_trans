<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran_Paket extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_paket';

    protected $table = 'pembayaran_paket';
    
    protected $fillable = 
    [
            'CARA_BAYAR',            
            'ID_REKENING' ,           
            'TGL_BAYAR'   ,          
            'JUMLAH_BAYAR' ,        
            'ID_SEWA_PAKET'   ,       
            'STATUS_BAYAR'   ,     
            'NAMA_BANK_PENGIRIM',   
            'NOREK_PENGIRIM'     ,   
            'KETERANGAN'          , 
            'BUKTI_TF'             ,
            'ATAS_NAMA'             
    ];
}
