<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    use SoftDeletes;
    protected $fillable = [
        'title',
        'short_description',
        'front_image',
        'detail_image',
        'url',
        'cta_image',
        'meta_title',
        'meta_description',
        'date',
        'detail_description',
        'blog_faq',
        'status',
        'conclusion',
        'updated_at',
        'deleted_at'
    ];
    protected $casts = [
        'blog_faq' => 'array',
    ];
}
 