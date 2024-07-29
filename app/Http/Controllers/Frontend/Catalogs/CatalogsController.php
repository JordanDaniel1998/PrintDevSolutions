<?php

namespace App\Http\Controllers\Frontend\Catalogs;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use Illuminate\Http\Request;

class CatalogsController extends Controller
{
    public function index(){
        $informations = Information::all()->first();
        $isBlog = Blog::where('visible', true)->exists();

        return view('frontend.home.catalogs.index', compact('informations', 'isBlog'));
    }
}
