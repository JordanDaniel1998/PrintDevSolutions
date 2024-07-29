<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index(User $user)
    {
        $isBlog = Blog::where('visible', true)->exists();
        $informations = Information::all()->first();
        return view('frontend.home.user.direction', compact('user', 'informations', 'isBlog'));
    }
}