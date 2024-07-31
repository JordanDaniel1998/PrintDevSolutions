<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'last','email','cellphone','payment_methods','name_cuenta','numero_cuenta','fecha_cuenta','cvc_cuenta','discount', 'total_amount', 'type', 'subTotal'];

    // Una orden puede tener muchos items de productos

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    // Una orden solo le pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

}