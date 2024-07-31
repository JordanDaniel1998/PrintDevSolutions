<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.index', compact('admin'));
    }
}