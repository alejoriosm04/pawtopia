<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Permitir el acceso
        }

        return redirect()->route('home.index')->withErrors(__('auth.unauthorized'));
    }
}
