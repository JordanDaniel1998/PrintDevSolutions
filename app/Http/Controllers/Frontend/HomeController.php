<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Highlighted;
use App\Models\Information;
use App\Models\OrderItem;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
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
        $testimonies = Post::with('user')
            ->whereIn('id', $latestPostIds)
            ->whereBetween('stars', [4, 5])
            ->latest()
            ->get(); // Busca el id de la tabla post en el array anterior

        $blogs = Blog::where('visible', 1) // Solo blogs visibles
            ->latest() // Ordena por fecha de creación en orden descendente
            ->limit(4) // Limita a 4 resultados
            ->get();

        $informations = Information::all()->first();

        $isBlog = Blog::where('visible', true)->exists();

        // Feature products
        $features = Product::where('visible', 1)->where('destacado', 1)->where('discount', 0.0)->latest()->limit(4)->get();
        // Discount products
        $discounted = Product::where('visible', 1)->where('discount', '>', 0.0)->where('destacado', 0)->latest()->limit(4)->get();

        // Solo los 3 productos mas vendidos con su categoría
        $totalSoldPerProducts = OrderItem::select('order_items.product_id', 'products.imagen', DB::raw('SUM(order_items.quantity) as total_quantity'))->join('products', 'order_items.product_id', '=', 'products.id')->join('categories', 'products.categorie_id', '=', 'categories.id')->groupBy('order_items.product_id', 'products.categorie_id', 'products.imagen')->orderBy('total_quantity', 'desc')->limit(3)->get();

        $totalSoldPerProductsCategories = OrderItem::select('order_items.product_id', 'products.categorie_id', 'products.title as product_name', 'products.price', 'products.imagen', 'products.subTitle', 'products.discount', 'categories.name as category_name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->groupBy('order_items.product_id', 'products.categorie_id', 'products.title', 'products.price', 'products.imagen', 'products.subTitle', 'products.discount', 'categories.name')
            ->orderBy('total_quantity', 'desc')
            ->offset(3) // Saltar los primeros 3 registros
            ->limit(3) // Limitar a los siguientes 3 registros
            ->get();

        // productos

        return view('frontend.home.main.index', compact('highlighteds', 'partners', 'testimonies', 'blogs', 'informations', 'isBlog', 'features', 'discounted', 'totalSoldPerProductsCategories', 'totalSoldPerProducts'));
    }
}