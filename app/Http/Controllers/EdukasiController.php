<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    /**
     * Display edukasi listing
     */
    public function index()
    {
        $edukasiList = Edukasi::orderBy('created_at', 'desc')->get();
        
        return view('edukasi.index', [
            'edukasiList' => $edukasiList,
        ]);
    }

    /**
     * Display single edukasi detail
     */
    public function show($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        
        return view('edukasi.show', [
            'edukasi' => $edukasi,
        ]);
    }
}
