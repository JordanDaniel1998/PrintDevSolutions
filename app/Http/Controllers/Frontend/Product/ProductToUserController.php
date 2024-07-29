<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductToUserController extends Controller
{
    public function index(Product $product)
    {

        $informations = Information::all()->first();
        $isBlog = Blog::where('visible', true)->exists();
        return view('frontend.home.product.index', compact('informations', 'isBlog', 'product'));
    }
}