<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display products listing page
     */
    public function index()
    {
        $produks = Produk::where('tersedia', true)->orderBy('created_at', 'desc')->paginate(12);

        return view('produk.index', [
            'produks' => $produks,
        ]);
    }

    /**
     * Display product detail page
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.show', [
            'produk' => $produk,
        ]);
    }
}
