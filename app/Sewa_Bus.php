<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa_Bus extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_SEWA_BUS';

    protected $table = 'sewa_bus';
    
    protected $fillable = 
    [
        'ID_PENGGUNA',
        'ID_CUSTOMER',
        'TGL_SEWA_BUS',
        'TGL_AKHIR_SEWA',
        'JAM_SEWA',
        'JAM_AKHIR_SEWA',
        'LAMA_SEWA',
        'DP_BUS',
        'HARGA_SEWA_BUS',
        'STATUS_SEWA'
    ];
}
