<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

// PhpSpreadsheet is optional; we fallback to CSV if not available

class OrderController extends Controller
{
    /**
     * Display order listing
     */
    public function index(Request $request)
    {
        $status = $request->input('status');

        $orders = Order::with('user')
            ->when($status, fn ($q) => $q->byStatus($status))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.orders.index', [
            'orders' => $orders,
            'currentStatus' => $status,
        ]);
    }

    /**
     * Export orders to CSV (opens in Excel)
     */
    public function export(Request $request)
    {
        $status = $request->input('status');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $orders = Order::with('user')
            ->when($status, fn ($q) => $q->byStatus($status))
            ->when($dateFrom, fn ($q) => $q->whereDate('created_at', '>=', $dateFrom))
            ->when($dateTo, fn ($q) => $q->whereDate('created_at', '<=', $dateTo))
            ->orderBy('created_at', 'desc')
            ->get();

        // If PhpSpreadsheet is available, produce XLSX; otherwise fallback to CSV
        if (class_exists(\PhpOffice\PhpSpreadsheet\Spreadsheet::class)) {
            $fileName = 'orders_'.now()->format('Ymd_His').'.xlsx';

            // Create spreadsheet
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();

            $headers = ['Order ID', 'Customer Name', 'Customer Email', 'Total', 'Status', 'Created At', 'Items'];
            // Write header
            $col = 1;
            foreach ($headers as $h) {
                $sheet->setCellValueByColumnAndRow($col, 1, $h);
                $col++;
            }

            $rowNum = 2;
            foreach ($orders as $order) {
                $itemsText = is_array($order->items)
                    ? collect($order->items)->map(fn ($i) => ($i['nama_produk'] ?? $i['id']).' x'.($i['qty'] ?? 1))->join('; ')
                    : (is_string($order->items) ? $order->items : json_encode($order->items));

                $data = [
                    $order->order_id ?? $order->id,
                    $order->user->name ?? '',
                    $order->user->email ?? '',
                    $order->total,
                    ucfirst($order->status),
                    $order->created_at->format('Y-m-d H:i:s'),
                    $itemsText,
                ];

                $col = 1;
                foreach ($data as $cell) {
                    $sheet->setCellValueByColumnAndRow($col, $rowNum, $cell);
                    $col++;
                }

                $rowNum++;
            }

            // Auto-size columns (best-effort)
            foreach (range(1, count($headers)) as $i) {
                $sheet->getColumnDimensionByColumn($i)->setAutoSize(true);
            }

            // Stream XLSX to output
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            $responseHeaders = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            ];

            // Stream output
            return response()->stream(function () use ($writer) {
                $writer->save('php://output');
            }, 200, $responseHeaders);
        }

        // Fallback CSV (existing behavior)
        $fileName = 'orders_'.now()->format('Ymd_His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ];

        $callback = function () use ($orders) {
            $out = fopen('php://output', 'w');
            // BOM for Excel to recognize UTF-8
            fprintf($out, '%s', chr(0xEF).chr(0xBB).chr(0xBF));

            // Header
            fputcsv($out, ['Order ID', 'Customer Name', 'Customer Email', 'Total', 'Status', 'Created At', 'Items']);

            foreach ($orders as $order) {
                $itemsText = is_array($order->items)
                    ? collect($order->items)->map(fn ($i) => ($i['nama_produk'] ?? $i['id']).' x'.($i['qty'] ?? 1))->join('; ')
                    : (is_string($order->items) ? $order->items : json_encode($order->items));

                $row = [
                    $order->order_id ?? $order->id,
                    $order->user->name ?? '',
                    $order->user->email ?? '',
                    $order->total,
                    ucfirst($order->status),
                    $order->created_at->format('Y-m-d H:i:s'),
                    $itemsText,
                ];

                fputcsv($out, $row);
            }

            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
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
        $old = $order->status;
        $order->update(['status' => $request->status]);
        // Log the change for debugging purposes
        \Log::info('Order status update', [
            'order_id' => $order->id,
            'old' => $old,
            'new' => $order->status,
            'requested' => $request->status,
            'user_id' => $request->user()?->id,
        ]);

        // If AJAX, return JSON for client-side handling
        if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'status' => $order->status,
                'message' => 'Status updated',
            ]);
        }

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
