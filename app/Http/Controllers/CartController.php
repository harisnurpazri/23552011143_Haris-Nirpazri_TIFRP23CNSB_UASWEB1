<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Helper to check admin and return proper response
     */
    protected function denyIfAdmin(Request $request)
    {
        $user = $request->user();
        if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json(['message' => 'Admin tidak diizinkan melakukan pembelian.'], 403);
            }

            if (app('router')->has('admin.dashboard')) {
                return redirect()->route('admin.dashboard')->with('error', 'Admin tidak dapat melakukan pembelian.');
            }

            return redirect('/')->with('error', 'Admin tidak dapat melakukan pembelian.');
        }

        return null;
    }

    /**
     * Display cart page
     */
    public function index(Request $request)
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        if (!empty($cart)) {
            foreach ($cart as $productId => $qty) {
                $product = Produk::find($productId);
                if ($product) {
                    $subtotal = $product->harga * $qty;
                    $items[] = [
                        'product' => $product,
                        'qty' => $qty,
                        'subtotal' => $subtotal,
                    ];
                    $total += $subtotal;
                }
            }
        }

        return view('cart.index', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, $id)
    {
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $product = Produk::findOrFail($id);
        
        if (!$product->isInStock()) {
            // For AJAX callers, return JSON error; otherwise normal redirect back
            if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json(['success' => false, 'message' => 'Produk tidak tersedia.'], 422);
            }

            return back()->with('error', 'Produk tidak tersedia.');
        }

        $cart = session('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session(['cart' => $cart]);

        // If this was called via AJAX/fetch, always return JSON so frontend can update UI reliably.
        if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'message' => 'Produk ditambahkan ke keranjang!',
                'cartCount' => array_sum($cart),
            ]);
        }

        // Otherwise perform normal redirect back for classic form submit
        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    /**
     * Update cart quantity
     */
    public function update(Request $request, $id)
    {
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = session('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id] = $request->qty;
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Keranjang berhasil diperbarui!');
    }

    /**
     * Remove item from cart
     */
    public function remove($id)
    {
        // create a fake request to check user role via auth helper
        $request = request();
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $cart = session('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Produk dihapus dari keranjang!');
    }

    /**
     * Display checkout page
     */
    public function checkout()
    {
        $request = request();
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Keranjang kosong!');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            $product = Produk::find($productId);
            if ($product) {
                $subtotal = $product->harga * $qty;
                $items[] = [
                    'product' => $product,
                    'qty' => $qty,
                    'subtotal' => $subtotal,
                ];
                $total += $subtotal;
            }
        }

        return view('cart.checkout', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    /**
     * Process checkout
     */
    public function processCheckout(Request $request)
    {
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Keranjang kosong!');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            $product = Produk::find($productId);
            if ($product) {
                $subtotal = $product->harga * $qty;
                $items[] = [
                    'id' => $product->id,
                    'nama_produk' => $product->nama_produk,
                    'harga' => $product->harga,
                    'qty' => $qty,
                    'subtotal' => $subtotal,
                ];
                $total += $subtotal;
            }
        }

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'items' => $items,
            'status' => 'pending',
        ]);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('invoice.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Display invoice
     */
    public function invoice($id)
    {
        $request = request();
        if ($resp = $this->denyIfAdmin($request)) {
            return $resp;
        }

        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        
        return view('cart.invoice', [
            'order' => $order,
        ]);
    }

    /**
     * Return simple cart count as JSON (for JS fallback)
     */
    public function count(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return response()->json([
            'cartCount' => array_sum($cart),
        ]);
    }
}
