<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa_Paket_Wisata extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_SEWA_PAKET';

    protected $table = 'sewa_paket_wisata';
    
    protected $fillable = 
    [
        'ID_PENGGUNA',
        'ID_CUSTOMER',
        'ID_PAKET',
        'TGL_SEWA_PAKET',
        'TGL_AKHIR_SEWA_PAKET',
        'JAM_SEWA_PAKET',
        'JAM_AKHIR_SEWA_PAKET',
        'DP_PAKET',
        'HARGA_SEWA_PAKET'
    ];

}
