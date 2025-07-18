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
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminAuth::class,
            'domain.redirect' => \App\Http\Middleware\DomainRedirect::class,
        ]);
        
        // Aplicar el middleware de redirección de dominio globalmente
        $middleware->append(\App\Http\Middleware\DomainRedirect::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
