<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImages extends Model
{
    protected $table = 'product_images';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'product_master_id',
        'color_id',
        'image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
     public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductMaster::class, 'product_master_id');
    }
}
