<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;
    protected $table = 'product_enquiry';
    protected $fillable = [
        'name',
        'company_name',
        'product_name',
        'contact',
        'country',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];
}
