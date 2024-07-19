<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::check() && Auth::user()->hasPermission($permission)) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access this resource.');
    }
}
