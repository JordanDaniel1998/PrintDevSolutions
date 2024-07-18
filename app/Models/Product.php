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

    protected $fillable = ['title', 'subTitle', 'description', 'imagen', 'description_short', 'price', 'stock'];

    // Un producto puede tener muchas imagenes

    public function files(){
        return $this->hasMany(File::class);
    }


}
