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
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            // Check if request is AJAX/JSON
            if ($request->expectsJson() || $request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin tidak diizinkan melakukan pembelian.',
                ], 403);
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
