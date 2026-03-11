<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if(!auth()->user()->can($permission)){
            abort(403);
        }

        return $next($request);
    }
}