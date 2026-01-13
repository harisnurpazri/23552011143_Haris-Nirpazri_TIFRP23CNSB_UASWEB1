<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display order listing
     */
    public function index(Request $request)
    {
        $status = $request->input('status');

        $orders = Order::with('user')
            ->when($status, fn($q) => $q->byStatus($status))
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.orders.index', [
            'orders' => $orders,
            'currentStatus' => $status,
        ]);
    }

    /**
     * Show order detail
     */
    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        
        return view('admin.orders.show', [
            'order' => $order,
        ]);
    }

    /**
     * Update order status
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
