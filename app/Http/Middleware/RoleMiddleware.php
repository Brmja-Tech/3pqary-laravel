<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check if the user has the 'admin' role
        if (Auth::user()->role !== 'admin') {
            return redirect('/home');
        }

        return $next($request);
    }
}

