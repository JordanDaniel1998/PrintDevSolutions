<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Esta tabla se vincula con las categorias de blog
class CategoryBlog extends Model
{
    use HasFactory;

    // Asegura que el campo se maneje como booleano
    protected $casts = [
        'visible' => 'boolean',
    ];

    protected $fillable = ['name', 'imagen'];

    // Una categoría puede tener muchos blogs

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
