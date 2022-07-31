<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_REKENING';

    protected $table = 'rekening';
    
    protected $fillable = 
    [
        'NAMA_BANK',
        'NOMOR_REKENING',
        'ATAS_NAMA'
    ];
}
