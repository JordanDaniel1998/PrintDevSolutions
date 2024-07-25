<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // Asegura que el campo se maneje como booleano
    protected $casts = [
        'visible' => 'boolean',
    ];

    protected $fillable = ['title', 'description', 'imagen', 'visible'];
}
