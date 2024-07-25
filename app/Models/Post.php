<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment', 'stars'];


    // Relaciones

    // Un post solo le pertence a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}