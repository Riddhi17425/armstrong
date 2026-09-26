<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    protected $table = 'certificates';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'image',
        'alt',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
