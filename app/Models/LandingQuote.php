<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingQuote extends Model
{
    use HasFactory;
    protected $table = 'landing_quote_form';
    protected $fillable = [
        'name',
        'company_name',
        'contact',
        'email',
        'message',
        'customization_details',
        'created_at',
        'updated_at',
    ];
}
