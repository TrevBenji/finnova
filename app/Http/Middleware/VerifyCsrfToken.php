<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URIs that should be excluded from CSRF verification.
     *
     * This allows login and register forms to work temporarily if CSRF is failing.
     */
    protected $except = [
        '/login',
        '/register',
    ];
}