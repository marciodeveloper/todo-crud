<?php

namespace App\Http;

class Kernel extends HttpKernel
{
    protected $middleware = [
       // Global middleware here
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware for web routes here
        ],

        'api' => [
            // Middleware for API routes here
        ],
    ];

    protected $routeMiddleware = [

      ];
}
