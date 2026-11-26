<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->dontReport([
            \ErrorException::class,
        ]);
    })
    ->booted(function (): void {
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        set_error_handler(function ($severity, $message, $file, $line) {
            if ($severity === E_DEPRECATED || $severity === E_USER_DEPRECATED) {
                return true;
            }
            return false;
        });
    })
    ->create();
