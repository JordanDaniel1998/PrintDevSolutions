<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('frontend.auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'last' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        /* 'password' => Hash::make($request->password)*/
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'last' => $request->last,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2 // 2 user - 1 admin
        ]);

        // Autentica al usuario para el inicio de sesion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

    }
}