<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subcategorie_id', 'imagen'];

    public function subcategorie()
    {
        return $this->belongsTo(Subcategorie::class);
    }
}