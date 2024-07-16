<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'title', 'imagen'];

    // Una imagen solo le pertenece a un producto
    public function product(){
        $this->belongsTo(Product::class);
    }

}