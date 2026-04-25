<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quote_form';

    protected $fillable = [
        'name',
        'company_name',
        'contact',
        'country',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];
}
