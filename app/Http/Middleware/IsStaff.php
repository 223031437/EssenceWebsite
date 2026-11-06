<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access if the user is an employee OR an admin
        if (auth()->check() && in_array(auth()->user()->role, ['employee', 'admin'])) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access the staff area.');
    }
}