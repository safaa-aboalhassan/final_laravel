<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request,User $user, Closure $next): Response
    {
        return $next($request);
        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'chef') {
            return redirect('/chef');
        }
    
        return redirect('/witter');
    }
    
   
}
