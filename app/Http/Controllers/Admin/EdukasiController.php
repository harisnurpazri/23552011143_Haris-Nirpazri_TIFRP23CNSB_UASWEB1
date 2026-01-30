<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edukasiList = Edukasi::latest()->paginate(10);

        return view('admin.edukasi.index', compact('edukasiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.edukasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = public_path('assets/img');
            $profileImage = date('YmdHis').'_'.$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = $profileImage;
        }

        Edukasi::create($input);

        return redirect()->route('admin.edukasi.index')
            ->with('success', 'Artikel edukasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edukasi $edukasi)
    {
        return view('admin.edukasi.edit', compact('edukasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edukasi $edukasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            // Delete old image
            if ($edukasi->gambar && file_exists(public_path('assets/img/'.$edukasi->gambar))) {
                unlink(public_path('assets/img/'.$edukasi->gambar));
            }

            $destinationPath = public_path('assets/img');
            $profileImage = date('YmdHis').'_'.$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = $profileImage;
        } else {
            unset($input['gambar']);
        }

        $edukasi->update($input);

        return redirect()->route('admin.edukasi.index')
            ->with('success', 'Artikel edukasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edukasi $edukasi)
    {
        if ($edukasi->gambar && file_exists(public_path('assets/img/'.$edukasi->gambar))) {
            unlink(public_path('assets/img/'.$edukasi->gambar));
        }

        $edukasi->delete();

        return redirect()->route('admin.edukasi.index')
            ->with('success', 'Artikel edukasi berhasil dihapus.');
    }
}
