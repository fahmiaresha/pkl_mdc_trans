<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_Armada extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_SCHEDULE';

    protected $table = 'schedule_armada';
    
    protected $fillable = 
    [
        'ID_SCHEDULE',
        'ID_ARMADA',
        'ID_SEWA_CATEGORY',
        'ID_SEWA_PAKET',
        'TGL_SEWA',
        'JAM_SEWA',
        'TGL_AKHIR_SEWA',
        'JAM_AKHIR_SEWA',
        'STATUS_ARMADA'
    ];
}
