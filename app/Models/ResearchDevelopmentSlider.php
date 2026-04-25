<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchDevelopmentSlider extends Model
{
    protected $table = 'research_development_slider';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'image',
        'alt',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
