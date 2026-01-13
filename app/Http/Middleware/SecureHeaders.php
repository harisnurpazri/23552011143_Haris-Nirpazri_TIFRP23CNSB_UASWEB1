<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureHeaders
{
    /**
     * Handle an incoming request and add security headers to the response.
     */
    public function handle(Request $request, Closure $next)
    {
        // Generate a per-request nonce for CSP to allow safe inline scripts/styles
        try {
            $nonce = base64_encode(random_bytes(16));
        } catch (\Throwable $e) {
            $nonce = bin2hex(random_bytes(8));
        }

        // Share nonce with views for use in inline <script nonce="..."> tags
        try {
            if (function_exists('view')) {
                view()->share('cspNonce', $nonce);
            } else {
                app('view')->share('cspNonce', $nonce);
            }
        } catch (\Throwable $e) {
            // ignore if view container not available
        }

        $response = $next($request);
        // Basic recommended security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');

        // HTTP Strict Transport Security (HSTS): 1 year, include subdomains, preload
        // Only add HSTS when the request is secure (HTTPS) or APP_URL is configured to https
        try {
            $appUrl = config('app.url') ?? env('APP_URL');
            $isHttps = $request->isSecure() || (is_string($appUrl) && str_starts_with($appUrl, 'https'));
        } catch (\Throwable $e) {
            $isHttps = false;
        }

        if ($isHttps) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // Content Security Policy (more specific). Adjust hosts below to match your external CDNs.
        // This policy allows scripts/styles from self and the common CDNs used (cdn.jsdelivr.net,cdnjs),
        // allows images from self/data/https, and fonts from Google Fonts.
        // Build CSP using nonce for inline scripts/styles and limiting external hosts.
        $cspParts = [
            "default-src 'self' https:",
            // Note: Alpine.js evaluates template expressions using Function/new Function which requires
            // 'unsafe-eval' in CSP. Adding it here restores Alpine behaviour. For stricter security,
            // consider refactoring templates to avoid inline expressions or use a CSP-friendly Alpine build.
            "script-src 'self' 'nonce-{$nonce}' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https:",
            "style-src 'self' 'nonce-{$nonce}' 'unsafe-inline' https://fonts.googleapis.com https:",
            "img-src 'self' data: https:",
            "font-src 'self' https://fonts.gstatic.com data:",
            "connect-src 'self' https:",
            "frame-ancestors 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "upgrade-insecure-requests",
        ];

        // Join with semicolons so each directive is properly separated (required by CSP syntax)
        $response->headers->set('Content-Security-Policy', implode('; ', $cspParts));

        return $response;
    }
}
