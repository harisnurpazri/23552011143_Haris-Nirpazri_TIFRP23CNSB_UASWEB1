<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class EnsureXsrfCookieFlags
{
    /**
     * Ensure the XSRF-TOKEN cookie has Secure/SameSite flags in production.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        try {
            $token = $request->cookie('XSRF-TOKEN') ?? $request->session()->token();
            if (! $token) {
                return $response;
            }

            $appUrl = config('app.url') ?? env('APP_URL');
            $isHttps = $request->isSecure() || (is_string($appUrl) && str_starts_with($appUrl, 'https')) || (env('APP_ENV') === 'production');

            $sameSite = config('session.same_site', 'lax');
            $domain = config('session.domain') ?: null;

            // Create a session cookie (expires 0) with desired flags.
            $cookie = new Cookie(
                'XSRF-TOKEN',
                $token,
                0,
                '/',
                $domain,
                $isHttps,
                false, // HttpOnly must be false so front-end JS can read it
                false,
                $sameSite
            );

            $response->headers->setCookie($cookie);
        } catch (\Throwable $e) {
            // best-effort: if something fails, do not break the response
        }

        return $response;
    }
}
