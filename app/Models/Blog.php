<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['category_blog_id', 'title', 'subTitle', 'keywords', 'description_short', 'description','imagen', 'visible'];

    // Un blog solo le pertenece a una categoría

    public function categoryBlog(){
        return $this->belongsTo(CategoryBlog::class);
    }

}