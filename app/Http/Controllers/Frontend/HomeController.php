<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Highlighted;
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

        return view('frontend.home.main.index', compact('highlighteds', 'partners', 'testimonies'));
    }
}