<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Highlighted;
use App\Models\Information;
use App\Models\Partner;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $highlighteds = Highlighted::all();
        $partners = Partner::where('visible', 1)->latest()->get();

        // Ultimo comentario de cada usuario
        $latestPostIds = Post::select(DB::raw('MAX(id) as id'))->groupBy('user_id')->pluck('id'); // Agrupa por user_id y devuelve un array de id correspondientes a la tabla post, es decir te trae un array de usuarios unicos con id de la tabla post
        $testimonies = Post::with('user')->whereIn('id', $latestPostIds)->whereBetween('stars', [4, 5])->latest()->get(); // Busca el id de la tabla post en el array anterior

        $blogs = Blog::where('visible', 1) // Solo blogs visibles
        ->latest() // Ordena por fecha de creación en orden descendente
        ->limit(4) // Limita a 4 resultados
        ->get();

        $informations = Information::all()->first();

        $isBlog = Blog::where('visible', true)->exists();

        return view('frontend.home.main.index', compact('highlighteds', 'partners', 'testimonies', 'blogs', 'informations', 'isBlog'));
    }
}