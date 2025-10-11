<?php

use App\Http\Middleware\StudentAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../commands.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'student.auth' => StudentAuth::class,
            'admin.auth' => \App\Http\Middleware\AdminAuth::class,
            'instructor.auth' => \App\Http\Middleware\InstructorAuth::class,
            // ... other middleware aliases
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();