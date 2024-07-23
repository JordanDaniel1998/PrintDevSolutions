<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Highlighted;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $highlighteds  = Highlighted::all();

        return view('frontend.home.main.index', compact('highlighteds'));
    }
}
