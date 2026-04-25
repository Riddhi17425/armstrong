<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InquiryProducts extends Model
{
    protected $table = 'inquiry_products';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'inquiry_id',
        'product_id',
        'name',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
