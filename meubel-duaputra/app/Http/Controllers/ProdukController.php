<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
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
