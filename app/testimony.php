<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_TESTI';

    protected $table = 'testimony';
    
    protected $fillable = 
    [
        'NAMA_TESTI',
        'TESTIMONY',
        'STATUS'
    ];
}
