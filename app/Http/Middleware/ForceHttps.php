<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttps
{
    /**
     * Redirect to HTTPS when FORCE_HTTPS is enabled.
     */
    public function handle(Request $request, Closure $next)
    {
        // Only enforce when configured; safe for local dev when false
        if (!filter_var(env('FORCE_HTTPS', false), FILTER_VALIDATE_BOOLEAN)) {
            return $next($request);
        }

        // If request already secure, continue
        if ($request->isSecure() || $request->header('X-Forwarded-Proto') === 'https') {
            return $next($request);
        }

        $uri = 'https://' . $request->getHttpHost() . $request->getRequestUri();

        return redirect()->to($uri, 301);
    }
}
