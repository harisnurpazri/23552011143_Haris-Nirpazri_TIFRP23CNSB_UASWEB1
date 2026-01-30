<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $period = request()->input('period', 7);
        $period = (int) $period;
        if ($period <= 0) {
            $period = 7;
        }
        // limit to prevent excessive queries
        $period = min($period, 90);
        // Stats
        $produkCount = Produk::count();
        $userCount = User::where('role', 'user')->count();
        $orderCount = Order::count();
        $todayOrders = Order::today()->count();
        $unreadChats = ChatMessage::unread()->fromUsers()->count();

        // Total revenue
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total');

        // Chart data (last N days) - ensure every day appears (fill 0 when no orders)
        $startDate = now()->subDays($period - 1)->startOfDay();
        $raw = Order::selectRaw('DATE(created_at) as dt, COUNT(*) as cnt, SUM(total) as revenue')
            ->where('created_at', '>=', $startDate)
            ->groupBy('dt')
            ->orderBy('dt')
            ->get()
            ->keyBy('dt');

        $chartData = collect();
        for ($i = $period - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $entry = $raw->get($date);
            $chartData->push((object) [
                'dt' => $date,
                'cnt' => $entry ? (int) $entry->cnt : 0,
                'revenue' => $entry ? (float) $entry->revenue : 0,
            ]);
        }

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

    /**
     * Return chart data as JSON for AJAX requests
     */
    public function chartData(Request $request)
    {
        $period = $request->input('period', 7);
        $period = (int) $period;
        if ($period <= 0) {
            $period = 7;
        }
        $period = min($period, 90);

        $startDate = now()->subDays($period - 1)->startOfDay();
        $raw = Order::selectRaw('DATE(created_at) as dt, COUNT(*) as cnt, SUM(total) as revenue')
            ->where('created_at', '>=', $startDate)
            ->groupBy('dt')
            ->orderBy('dt')
            ->get()
            ->keyBy('dt');

        $chartData = collect();
        for ($i = $period - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $entry = $raw->get($date);
            $chartData->push([
                'dt' => $date,
                'cnt' => $entry ? (int) $entry->cnt : 0,
                'revenue' => $entry ? (float) $entry->revenue : 0,
            ]);
        }

        return response()->json($chartData);
    }
}
