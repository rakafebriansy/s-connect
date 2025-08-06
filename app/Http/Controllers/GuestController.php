<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\Potensi;
use App\Models\Wisata;
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
    public function indexWisata(Request $request)
    {
        $keyword = $request->search;

        $wisatas = Wisata::with(['gambar_wisatas'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama', 'like', "%$keyword%");
            })
            ->paginate(9);

        return view('pages.wisata.index', compact('wisatas'));
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

    public function createPengaduan()
    {
        return view('pages.pengaduan.create');
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'dusun' => 'required|string|max:255',
            'jenis_pengaduan' => 'required|in:umum,fasilitas,sosial',
        ]);

        Pengaduan::create($request->only('judul', 'isi', 'dusun', 'jenis_pengaduan'));

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim.');
    }
}
