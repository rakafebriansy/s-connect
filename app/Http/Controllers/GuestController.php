<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(6)->get();
        return view('pages.landing', compact('beritas'));
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
