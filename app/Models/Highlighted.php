<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlighted extends Model
{
    use HasFactory;

    protected $fillable = ['metrics', 'highlighted'];

}
