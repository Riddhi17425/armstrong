<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobsCategory extends Model
{
    protected $table = 'jobcategory';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'title', 
        'description',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
