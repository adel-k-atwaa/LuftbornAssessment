<?php

namespace App\Http\Middleware;

use App\Exceptions\UnauthorizedHttpException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Validation\UnauthorizedException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is("api/*")) {
                throw new UnauthorizedHttpException("User not authorized");
            }
            return route('login');
        }
    }
}
