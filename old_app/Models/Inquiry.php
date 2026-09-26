<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inquiry extends Model
{
    protected $table = 'inquiries';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'purpose_of_inquiry',
        'full_name',
        'mobile_number',
        'email',
        'company_name',
        'interested_machines',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
