<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_ARMADA';

    protected $table = 'armada';
    
    protected $fillable = 
    [
        'ID_CATEGORY',
        'NAMA_ARMADA',
        'PLAT_NOMOR',
        'KAPASITAS',
        'FASILITAS_ARMADA',
        'HARGA',
        'avatar'
    ];
}
