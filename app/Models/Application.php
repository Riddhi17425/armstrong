<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Application extends Model
{
    protected $table = 'application';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'alt',
        'status',
        'application_image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
}
 