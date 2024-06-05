<?php

use App\Http\Middleware\CheckForRole;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\HasJwtToken;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check-jwt' => EnsureTokenIsValid::class,
            'check-role' => CheckForRole::class
        ]);
        $middleware->append([
            HasJwtToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
