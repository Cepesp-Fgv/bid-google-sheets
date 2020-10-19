<?php

namespace App\Http\Middleware;

use Closure;

class SecureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $enabled = env('FORCE_HTTPS', false);
        $isLocal = app()->environment('local');

        if ($enabled && !$isLocal && $request->header('x-forwarded-proto') <> 'https') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
