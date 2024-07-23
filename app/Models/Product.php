<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Asegura que el campo se maneje como booleano
    protected $casts = [
        'visible' => 'boolean',
        'destacado' => 'boolean',
    ];

    protected $fillable = ['title', 'subTitle', 'description', 'imagen', 'description_short', 'sku', 'price', 'stock', 'categorie_id', 'subcategorie_id', 'brand_id'];

    // Un producto puede tener muchas imagenes
    public function files(){
        return $this->hasMany(File::class);
    }

    // Un producto puede tener muchas especificaciones
    public function specifications(){
        return $this->hasMany(Specification::class);
    }

}
