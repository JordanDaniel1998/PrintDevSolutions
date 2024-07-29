<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Esta tabla se vincula con las categorias de productos
class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'imagen'];

    // Una categoría tiene muchas subcategorías
    public function subcategories(){
        return $this->hasMany(Subcategorie::class);
    }

    // Una categoría tiene muchos productos
    public function products(){
        return $this->hasMany(Product::class);
    }
}
