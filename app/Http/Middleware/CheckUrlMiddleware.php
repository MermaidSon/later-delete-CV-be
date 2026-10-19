<?php

namespace App\Http\Middleware;

use App\Models\Access;
use Closure;
use Illuminate\Http\Request;

class CheckUrlMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $access = Access::orderByDesc('id')->first();

        if (!$access || $access->url !== $request->route('url') || $access->valid_until < now()) 
            abort(404);

        $request->attributes->set('access', $access);

        return $next($request);
    }
}
