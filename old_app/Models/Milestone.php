<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milestone';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'year',
        'title',
        'description',
        'image',
        'status',
        'alt_tag',
        'updated_at',
        'deleted_at'
    ];
}
 