<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductFeature extends Model
{
    protected $table = 'product_features';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
