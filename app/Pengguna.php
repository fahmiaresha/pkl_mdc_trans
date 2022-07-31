<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_PENGGUNA';

    protected $table = 'pengguna';
    
    protected $fillable = 
    [
        'NAMA_PENGGUNA',
        'USERNAME',
        'EMAIL_PENGGUNA',
        'TELEPHONE_PENGGUNA',
        'ALAMAT_PENGGUNA',
        'PASSWORD',
        'JOB_STATUS',
        'FOTO'
    ];
}
