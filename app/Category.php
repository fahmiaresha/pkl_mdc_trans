<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ID_CATEGORY';

    protected $table = 'category_armada';
    
    protected $fillable = 
    [
        'NAMA_CATEGORY'
    ];
}
