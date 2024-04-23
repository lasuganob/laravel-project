<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Middleware\StripTagsFromTextInputRequest;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => Admin::class,
            'is_user' => User::class,
            'sanitize' => StripTagsFromTextInputRequest::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
