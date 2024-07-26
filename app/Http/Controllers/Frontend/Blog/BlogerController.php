<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogerController extends Controller
{
    public function index()
    {
        $blogsLatest = Blog::latest()->where('visible', 1)->limit(3)->get();

        $blogs = Blog::where('visible', 1)
            ->latest() // Ordena por fecha de creación en orden descendente
            ->skip(3) // Salta los 3 primeros
            ->take(6) // Toma los siguientes 6
            ->get();

        return view('frontend.home.blog.index', compact('blogs', 'blogsLatest'));
    }

    public function show(Blog $blog)
    {
        $blogs = Blog::where('category_blog_id', $blog->categoryBlog->id) // Filtra por la categoría específica
            ->where('visible', 1) // Solo blogs visibles
            ->where('id', '!=', $blog->id) // Excluye el blog actual
            ->latest() // Ordena por fecha de creación en orden descendente
            ->limit(4) // Limita a 4 resultados
            ->get();

        return view('frontend.home.blog.post', compact('blog', 'blogs'));
    }
}
