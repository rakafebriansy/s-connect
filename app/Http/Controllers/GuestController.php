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
            ->paginate(9);

        return view('pages.potensi.index', compact('potensis'));
    }

    public function indexBerita(Request $request)
    {
        $query = Berita::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        $beritas = $query->latest()->paginate(6);

        return view('pages.berita.index', compact('beritas'));
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

    public function indexProfil()
    {
        return view('pages.profil.index', [
            'jumlah_penduduk' => 2134,
            'jumlah_kk' => 800,
            'jumlah_rt' => 12,
            'jumlah_rw' => 3,
            'luas_wilayah' => '4 Ha',
            'persentase_pertanian' => '80%',
        ]);

    }
}
