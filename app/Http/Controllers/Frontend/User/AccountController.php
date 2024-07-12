<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
   public function index(User $user){



    return view('frontend.home.user.index', compact('user'));
   }
}