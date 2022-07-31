<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_CUSTOMER';

    protected $table = 'customer';
    
    protected $fillable = 
    [
        'NAMA_CUSTOMER',
        'EMAIL_CUSTOMER',
        'TELEPHONE',
        'ALAMAT'
    ];
}
