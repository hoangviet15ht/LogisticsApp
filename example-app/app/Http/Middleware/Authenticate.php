<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
            $uriPath = $request->path();
            $uriPath = Str::of($uriPath)->trim('/');
            $uriPath->append('/');
            $uriPregMatched = [];
            if (preg_match("/^(admin|customer|transporter|manager)\//", $uriPath, $uriPregMatched)) {
                $prefix = end($uriPregMatched);

                return route($prefix.'.login');
            }

            return route('login');
        }
    }
}
