<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductCategory extends Model
{
    protected $table = 'product_categories';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'status',
        'category_image',
        'category_small_image',
        'listing_desc',
        'detail_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->hasMany(ProductMaster::class, 'category_id');
    }
    
    protected $casts = [
        'faqs' => 'array',
    ];
    
    
}
 