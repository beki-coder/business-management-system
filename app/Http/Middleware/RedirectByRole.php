<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('Admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('Manager')) {
                return redirect()->route('manager.dashboard');
            } elseif ($user->hasRole('Employee')) {
                return redirect()->route('employee.dashboard');
            }
        }

        return $next($request);
    }
}