<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    protected $table = 'product_masters';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'application_id',
        'url',
        'category_id',
        'subcategory_id',
        'product_name',
        'product_desc',
        'product_short_desc',
        'product_feature',
        'product_size',
        'product_status',
        'created_at',
        'product_pdf',
        'product_images', 
        'model_name',
        'product_usp',
        'product_technical',
        'product_tech_desc',
        'product_tags',
        'thumnail_image',
        'front_image',
        'video',
        'video_source',
        'meta_title',
        'meta_description',
        'product_app_desc',
        'product_applications',
        'updated_at',
        'deleted_at',
        'is_live',
    ];
     protected $casts = [
        'product_feature' => 'array',
        'product_industries' => 'array', // if you're doing the same for industries
        'product_usp' => 'array',
        'product_technical' => 'array',
    ];
   public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_master_id'); // assuming `product_color_id` is the foreign key
    }
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
    public function getUspArrayAttribute()
    {
        if (empty($this->product_usp)) {
            return [];
        }
        
        $decoded = json_decode($this->product_usp, true);
        return (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) ? $decoded : [];
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class, 'product_master_id');
    }

}
 