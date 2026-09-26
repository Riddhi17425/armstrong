<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GalleryTypes extends Model
{
    protected $table = 'gallery_types';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
