<?php

namespace App\Http; 

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel 
{
    // Middleware được sử dụng trong các nhóm route (middleware groups)
    protected $middlewareGroups = [
        'web' => [
            // ... Các middleware mặc định cho ứng dụng web
        ],
        'api' => [
            // ... Các middleware mặc định cho API
        ],
    ];

    // Middleware được gọi theo route
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        // ... Các middleware khác
        'check.login' => \App\Http\Middleware\CheckLogin::class,
        'check.user' => \App\Http\Middleware\CheckXemTin::class,
        'check.phaky' => \App\Http\Middleware\CheckPhaKy::class,
    ];
}