<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if(!auth()->user()->hasRole($role)){
            abort(403);
        }

        return $next($request);
    }
}