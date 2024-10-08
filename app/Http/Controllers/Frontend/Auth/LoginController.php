<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $isBlog = Blog::where('visible', true)->exists();
        $informations = Information::all()->first();
        return view('frontend.auth.login', compact('informations', 'isBlog'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Si no esta autenticado, redirecciona a la página anterior junto con el mensaje, este mensaje se guarda en una función llamada sesion
        if (!Auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('home');
    }
}
