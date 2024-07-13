<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Si no esta autenticado, redirecciona a la página anterior junto con el mensaje, este mensaje se guarda en una función llamada sesion
        if (!Auth()->attempt($request->only('email', 'password'))) {
            return back()->with([
                'message' => 'Credenciales incorrectas',
                'type' => 'error'
            ], 'Credenciales incorrectas');
        }

        return redirect()->route('admin.dashboard');
    }
}