<?php

namespace App\Http\Controllers\Frontend\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){

        $isBlog = Blog::where('visible', true)->exists();
        $informations = Information::all()->first();

        return view('frontend.home.about.index', compact('informations', 'isBlog'));
    }
}