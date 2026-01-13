<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
        $product = Produk::findOrFail($id);
        
        if (!$product->isInStock()) {
            return back()->with('error', 'Produk tidak tersedia.');
        }

        $cart = session('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session(['cart' => $cart]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk ditambahkan ke keranjang!',
                'cartCount' => array_sum($cart),
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    /**
     * Update cart quantity
     */
    public function update(Request $request, $id)
    {
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
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        
        return view('cart.invoice', [
            'order' => $order,
        ]);
    }
}
