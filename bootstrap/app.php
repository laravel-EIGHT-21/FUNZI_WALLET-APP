<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
        $middleware->redirectGuestsTo('/login'),
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
        ///'user-school' => \App\Http\Middleware\School::class,
        'student' => \App\Http\Middleware\StudentRedirectIfAuthenticated::class,
        'tour-operator' => \App\Http\Middleware\TourOperatorRedirectIfAuthenticated::class,
        'prevent-back-history' => \App\Http\Middleware\PreventBackButtonMiddleware::class,
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        'image-sanitize' => \LaravelAt\ImageSanitize\ImageSanitizeMiddleware::class,
        'dropboxAuth' =>\App\Http\Middleware\DropboxAuthenticated::class,

    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
