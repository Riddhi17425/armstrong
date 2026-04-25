<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPartner extends Model
{
    use HasFactory;

    protected $table = 'channel_partner';
    protected $fillable = [
        'name',
        'company_name',
        'business_type',
        'industry_segment',
        'contact',
        'email',
        'message',
    ];

}
