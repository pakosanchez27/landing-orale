<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verificamos si el usuario NO ha iniciado sesión
        if (!Auth::check()) {
            // Si no está logueado, lo mandamos al login con un mensaje
            return redirect()->route('admin.login')->with('error', 'Debes iniciar sesión primero.');
        }

        // 2. Si está logueado, dejamos que la petición continúe
        return $next($request);
    }
}
