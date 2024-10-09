<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'chef') {
            return redirect('/chef');
        }
    
        return redirect('/witter');
    }
    

    protected $routeMiddleware = [
        // ...
        'redirectIfAuthenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
    
}


