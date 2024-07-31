<?php

namespace App\Http\Controllers\Admin\CategoriesProducts;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesProductsController extends Controller
{
    public function index(){

        $categories = Categorie::with('subcategories.brands')->latest()->get();
        $admin = User::findOrFail(auth()->user()->id);

        return view('admin.dashboard.categoriesProducts.index', compact('categories', 'admin'));
    }
}