<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = 'events';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'type',
        'title',
        'description',
        'address',
        'start_date',
        'end_date',
        'image',
        'status',
        'alt',
        'updated_at',
        'deleted_at'
    ];
}
