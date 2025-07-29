<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleRedirect;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware){
// Global middleware (runs on every request)
        $middleware->append([
            \Illuminate\Http\Middleware\HandleCors::class,
            //\App\Http\Middleware\TrustProxies::class,
            \Illuminate\Http\Middleware\ValidatePostSize::class,
            //\App\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);

        // Middleware aliases (like the old $routeMiddleware)
        $middleware->alias([
            'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
           'admin' => \App\Http\Middleware\AdminMiddleware::class,
          'role.redirect' => \App\Http\Middleware\RedirectBasedOnRole::class,
           // 'auth' => \App\Http\Middleware\Authenticate::class,
            // Add more aliases as needed
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Custom exception handling
    })
    ->create();