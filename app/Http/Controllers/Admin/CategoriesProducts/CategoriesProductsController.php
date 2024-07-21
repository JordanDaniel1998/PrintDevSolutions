<?php

namespace App\Http\Controllers\Admin\CategoriesProducts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesProductsController extends Controller
{
    public function index(){
        return view('admin.dashboard.categoriesProducts.index');
    }
}
