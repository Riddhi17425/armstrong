<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsSlider extends Model
{
    protected $table = 'about_slider';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'alt',
        'image',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
