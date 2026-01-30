<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with product listing
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        // Get unique categories
        $categories = Produk::distinct()->pluck('kategori')->filter()->sort();

        // Get products with filters
        $products = Produk::query()
            ->when($search, fn ($q) => $q->search($search))
            ->when($kategori, fn ($q) => $q->byKategori($kategori))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'selectedKategori' => $kategori,
            'search' => $search,
        ]);
    }
}
