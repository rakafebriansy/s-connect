<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Potensi;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(6)->get();
        return view('pages.landing', compact('beritas'));
    }
    public function indexPotensi(Request $request)
{
    $keyword = $request->search;

    $potensis = Potensi::with(['u_m_k_m', 'gambar_potensis'])
        ->when($keyword, function ($query, $keyword) {
            $query->where('nama', 'like', "%$keyword%");
        })
        ->paginate(10);

    return view('pages.potensi.index', compact('potensis'));
}

    public function showBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('dilihat');

        $beritaLain = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.berita.show', compact('berita', 'beritaLain'));
    }
}
