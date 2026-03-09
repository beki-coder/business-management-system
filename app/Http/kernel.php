<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ],
    ];

    protected $routeMiddleware = [

        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'role.redirect' => \App\Http\Middleware\RedirectByRole::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,

    ];
}