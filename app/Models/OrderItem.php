<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price_actual', 'percentage_discount','price_discount','price_sale', 'color','igv'];

    // Un orden de items pertenece a una orden
    public function order(){
        return $this->belongsTo(OrderItem::class);
    }

     // Una orden de item solo le pertenece un producto

     public function product(){
        return $this->belongsTo(Product::class);
     }
}
