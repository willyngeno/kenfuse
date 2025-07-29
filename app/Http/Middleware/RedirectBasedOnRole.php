<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->route('vendor.dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('customer.dashboard');
            }  
 return $next($request);
    }
}
