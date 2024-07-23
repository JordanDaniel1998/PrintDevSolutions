<?php

namespace App\Http\Controllers\Admin\CategoriesProducts;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesProductsController extends Controller
{
    public function index(){

        $categories = Categorie::with('subcategories.brands')->latest()->get();


        return view('admin.dashboard.categoriesProducts.index', compact('categories'));
    }
}
