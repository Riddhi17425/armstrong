<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    protected $table = 'video';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'video_title',
        'thumnail_image',
        'video_source', 
        'video',
        'status',
        'video_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
