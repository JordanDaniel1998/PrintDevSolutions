<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'categorie_id', 'imagen'];


    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }


    public function brands(){
        return $this->hasMany(Brand::class);
    }
}