<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    protected $table = 'home_slider';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'image',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
