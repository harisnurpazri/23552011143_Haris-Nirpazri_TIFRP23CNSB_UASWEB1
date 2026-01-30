<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display product listing
     */
    public function index()
    {
        $products = Produk::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.produk.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $categories = Produk::distinct()->pluck('kategori')->filter()->sort();

        return view('admin.produk.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store new product
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $validated['gambar'] = $filename;
        }

        Produk::create($validated);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $categories = Produk::distinct()->pluck('kategori')->filter()->sort();

        return view('admin.produk.edit', [
            'produk' => $produk,
            'categories' => $categories,
        ]);
    }

    /**
     * Update product
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($produk->gambar && file_exists(public_path('assets/img/'.$produk->gambar))) {
                unlink(public_path('assets/img/'.$produk->gambar));
            }

            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $validated['gambar'] = $filename;
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Delete product
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Delete image if exists
        if ($produk->gambar && file_exists(public_path('assets/img/'.$produk->gambar))) {
            unlink(public_path('assets/img/'.$produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
