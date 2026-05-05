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
        'details_title',
        'url',
        'meta_title',
        'meta_description',
        'short_description',
        'website_top_desc',
        'website_bottom_desc',
        'website_top_image',
        'website_bottom_image',
        'faq',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
}
 