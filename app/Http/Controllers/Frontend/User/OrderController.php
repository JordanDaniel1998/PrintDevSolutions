<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(User $user)
    {
        $isBlog = Blog::where('visible', true)->exists();
        $informations = Information::all()->first();

        $orders = Order::with(['orderItems.product'])
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        /* $orderItems = $orders->pluck('orderItems')->flatten(); */
        return view('frontend.home.user.orders', compact('user', 'informations', 'isBlog', 'orders'));
    }
}