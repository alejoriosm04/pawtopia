<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Permitir el acceso
        }

        return redirect()->route('home.index')->withErrors(__('auth.unauthorized'));
    }
}