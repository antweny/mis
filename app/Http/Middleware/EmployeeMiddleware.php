<?php

namespace App\Http\Middleware;

use Closure;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->employee && auth()->user()->employee->active == 1) {
            return $next($request);
        }
        return abort(403);
    }
}
