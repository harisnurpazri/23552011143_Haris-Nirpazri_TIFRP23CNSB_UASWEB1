<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register secure headers middleware and rate limiters
        try {
            $router = $this->app['router'] ?? null;
            if ($router) {
                // alias and push into the web middleware group
                $router->aliasMiddleware('secure.headers', \App\Http\Middleware\SecureHeaders::class);
                $router->pushMiddlewareToGroup('web', \App\Http\Middleware\SecureHeaders::class);

                // optional HTTPS enforcement middleware (enabled via FORCE_HTTPS env)
                $router->aliasMiddleware('force.https', \App\Http\Middleware\ForceHttps::class);
                $router->pushMiddlewareToGroup('web', \App\Http\Middleware\ForceHttps::class);

                // Ensure XSRF cookie flags (Secure + SameSite) in production
                $router->aliasMiddleware('xsrf.flags', \App\Http\Middleware\EnsureXsrfCookieFlags::class);
                $router->pushMiddlewareToGroup('web', \App\Http\Middleware\EnsureXsrfCookieFlags::class);
            }
        } catch (\Throwable $e) {
            // Best-effort: if router is not available at boot time, skip.
        }

        // Rate limiters
        RateLimiter::for('login', function (Request $request) {
            // More granular: prefer email identifier when present, otherwise fallback to IP
            $by = $request->input('email') ? strtolower(trim($request->input('email'))) : $request->ip();

            return Limit::perMinute(5)->by($by)->response(function () {
                return response('Too many login attempts. Please try again later.', 429);
            });
        });

        RateLimiter::for('chat', function (Request $request) {
            return Limit::perMinute(30)->by($request->ip());
        });

        RateLimiter::for('export', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });
    }
}
