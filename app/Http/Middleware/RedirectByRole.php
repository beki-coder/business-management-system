<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectByRole
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $user = Auth::user();

            if($user->hasRole('Admin')) {
                return redirect('/admin/dashboard');
            }

            if($user->hasRole('Manager')) {
                return redirect('/manager/dashboard');
            }

            if($user->hasRole('Employee')) {
                return redirect('/employee/dashboard');
            }
        }

        return $next($request);
    }
}