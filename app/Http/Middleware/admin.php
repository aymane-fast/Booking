<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user() || !Auth::user()->role === 'admin') {
        return $next($request);
        }
        
        // If user is not an admin make sure they are redirected to the home page
        return redirect(route('home'))->with('error', "You don't have permission to view that page");
    }
}
