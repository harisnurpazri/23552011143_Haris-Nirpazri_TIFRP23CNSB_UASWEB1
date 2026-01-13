<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display user dashboard
     */
    public function index()
    {
        $user = auth()->user();
        
        // Get user's recent orders
        $recentOrders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'user' => $user,
            'recentOrders' => $recentOrders,
        ]);
    }
}
