<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    protected $table = 'gallary_image';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'alt',
        'image',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
