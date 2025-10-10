<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // If the request expects JSON, return null to let Laravel handle it as an API response
        if ($request->expectsJson()) {
            return null;
        }
        
        // For web requests, redirect to student login
        return route('student.login');
    }
}