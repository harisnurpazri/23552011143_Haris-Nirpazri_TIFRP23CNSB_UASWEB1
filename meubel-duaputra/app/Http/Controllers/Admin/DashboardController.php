<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        // Stats
        $produkCount = Produk::count();
        $userCount = User::where('role', 'user')->count();
        $orderCount = Order::count();
        $todayOrders = Order::today()->count();
        $unreadChats = ChatMessage::unread()->fromUsers()->count();

        // Total revenue
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total');

        // Chart data (last 7 days)
        $chartData = Order::selectRaw('DATE(created_at) as dt, COUNT(*) as cnt, SUM(total) as revenue')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('dt')
            ->orderBy('dt')
            ->get();

        // Recent orders
        $recentOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'produkCount' => $produkCount,
            'userCount' => $userCount,
            'orderCount' => $orderCount,
            'todayOrders' => $todayOrders,
            'unreadChats' => $unreadChats,
            'totalRevenue' => $totalRevenue,
            'chartData' => $chartData,
            'recentOrders' => $recentOrders,
        ]);
    }
}
