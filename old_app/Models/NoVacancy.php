<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoVacancy extends Model
{
    protected $table = 'novacancy_form';
    protected $fillable = [
        'id',
        'fullname',
        'email',
        'phone',
        'current_location',
        'linkedin_profile',
        'resume',
        'created_at',
        'updated_at'
    ];
}
