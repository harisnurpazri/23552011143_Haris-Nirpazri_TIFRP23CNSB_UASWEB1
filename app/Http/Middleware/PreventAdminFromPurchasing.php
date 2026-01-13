<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventAdminFromPurchasing
{
    /**
     * Handle an incoming request.
     * Redirect admin users away from cart/checkout actions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Admin tidak diizinkan melakukan pembelian.'], 403);
            }

            // Redirect admins to admin dashboard if available, otherwise to root
            if (app('router')->has('admin.dashboard')) {
                return redirect()->route('admin.dashboard')->with('error', 'Admin tidak dapat melakukan pembelian.');
            }

            return redirect('/')->with('error', 'Admin tidak dapat melakukan pembelian.');
        }

        return $next($request);
    }
}
