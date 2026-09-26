<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfrastructureSlider extends Model
{
    protected $table = 'infrastructure_slider';
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
