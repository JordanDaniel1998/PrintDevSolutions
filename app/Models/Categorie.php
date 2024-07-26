<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Esta tabla se vincula con las categorias de productos
class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'imagen'];

    public function subcategories(){
        return $this->hasMany(Subcategorie::class);
    }
}
