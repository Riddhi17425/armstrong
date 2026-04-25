<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';
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
 