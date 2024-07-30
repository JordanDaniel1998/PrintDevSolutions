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

    protected $fillable = ['title', 'subTitle', 'description', 'imagen', 'description_short', 'sku', 'price', 'stock', 'categorie_id', 'subcategorie_id', 'brand_id','discount'];

    // Un producto puede tener muchas imagenes
    public function files()
    {
        return $this->hasMany(File::class);
    }

    // Un producto puede tener muchas especificaciones
    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    // Un producto puede tene muchos atributos (colores)

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    // Un producto solo le pertenece a una categoría

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Un producto solo le pertenece a una subcategoría
    public function subcategorie()
    {
        return $this->belongsTo(Subcategorie::class);
    }

    // Un producto solo le pertenece a una marca
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
