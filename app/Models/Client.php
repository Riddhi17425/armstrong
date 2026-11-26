<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $table = 'client';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'title',
        'description',
        'designation',
        'rating',
        'status',
        'alt',
        'updated_at',
        'deleted_at'
    ];
}
