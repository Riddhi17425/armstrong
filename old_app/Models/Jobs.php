<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    protected $table = 'job';
    use SoftDeletes;    
    protected $fillable = [
        'jobcategory_id',
        'url',
        'title',
        'short_description',
        'meta_title',
        'meta_description',
        'details',
        'description',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
