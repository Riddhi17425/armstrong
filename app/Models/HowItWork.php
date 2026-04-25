<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class HowItWork extends Model
{
    protected $table = 'how_it_works';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'status',
        'alt_tag',
        'updated_at',
        'deleted_at'
    ];
}
 