<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not logged in, redirect to admin login page
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        
        // If user is logged in but not admin, redirect to home page
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect('/')->with('error', 'You do not have permission to access the admin panel.');
        }

        // User is logged in and is admin, proceed
        return $next($request);
    }
}