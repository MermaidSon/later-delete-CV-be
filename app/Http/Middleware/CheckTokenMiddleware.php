<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $access = $request->attributes->get('access');
        $token = $request->cookie('token');

        if (!$token || !hash_equals($access->token, hash('sha512', $token))) {
            abort(401);
        }

        return $next($request);
    }
}
