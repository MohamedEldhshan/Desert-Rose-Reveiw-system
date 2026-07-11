<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\HandleRateLimitExceeded;
use App\Http\Middleware\LimitRequestSize;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->appendToGroup('web', SetLocale::class);
        $middleware->append(HandleRateLimitExceeded::class);
        $middleware->append(LimitRequestSize::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
