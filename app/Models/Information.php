<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'inside', 'district', 'city', 'country', 'cellphone', 'office_phone', 'email', 'facebook', 'instagram', 'youtube', 'twitter', 'linkedin', 'tiktok', 'whatsapp', 'check_in', 'check_out', 'message_whatsapp', 'aboutUs'];
}