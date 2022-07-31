<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa_Bus_Category extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_SEWA_CATEGORY';

    protected $table = 'sewa_bus_category';
    
    protected $fillable = 
    [
        'ID_SEWA_BUS',
        'ID_CATEGORY',
        'QUANTITY',
        'HARGA_SEWA'
    ];
}
