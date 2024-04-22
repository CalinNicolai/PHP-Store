<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request The incoming request.
     * @param Closure $next The next middleware in the pipeline.
     * @return Response The response.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the role of 'admin'
        if (Auth::check() && Auth::user()->role()->first()->name == 'admin') {
            return $next($request);
        }

        // Redirect to the home page if the user is not authorized
        return redirect('/');
    }
}
