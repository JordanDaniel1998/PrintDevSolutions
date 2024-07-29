<?php

namespace App\Http\Controllers\Frontend\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(User $user){
        $isBlog = Blog::where('visible', true)->exists();
        $informations = Information::all()->first();
        return view('frontend.home.post.index', compact('user', 'informations', 'isBlog'));
    }
}