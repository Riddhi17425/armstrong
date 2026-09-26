<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    protected $table = 'career_form';
    protected $fillable = [
        'id',
        'fullname',
        'job_positions',
        'email',
        'phone',
        'current_location',
        'linkedin_profile',
        'resume',
        'created_at',
        'updated_at'
    ];
}
