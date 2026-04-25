<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForModel extends Model
{
    use HasFactory;

    protected $table = 'form_inquiry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'company_name', 'email', 'phone', 'country', 'note', 'image'
    ];
}
