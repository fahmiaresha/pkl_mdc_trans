<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricelist_Sewa_Armada extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_PRICELIST';

    protected $table = 'pricelist_sewa_armada';
    
    protected $fillable = 
    [
        'ID_CATEGORY',
        'TUJUAN_SEWA',
        'PRICELIST_SEWA'
    ];
}
