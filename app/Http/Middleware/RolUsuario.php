<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica que el usuario autenticado sea el que esta accediendo
        $currentUrl = $request->fullUrl();
        $user_id = (int) basename(parse_url($currentUrl, PHP_URL_PATH));

        if(auth()->user()->id !== $user_id){
            return redirect()->route('home');
        }

        return $next($request);
    }
}