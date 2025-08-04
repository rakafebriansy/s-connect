@extends('layouts.app')

@section('title', 'Berita Desa')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Berita Desa</h1>

        <!-- Search Bar -->
        <form action="{{ route('berita.index') }}" method="GET" class="flex items-center max-w-md mx-auto mb-6">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari berita..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-r-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </form>

        <!-- Berita Cards -->
        @if ($beritas->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($beritas as $berita)
                    <a href="{{ url('berita/' . $berita->id) }}"
                       class="block bg-white rounded-xl shadow-md overflow-hidden transition hover:shadow-lg hover:scale-[1.02] duration-300">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2 line-clamp-2">{{ $berita->judul }}</h2>
                            <p class="text-gray-600 text-sm line-clamp-3 break-words">
                                {{ $berita->deskripsi }}
                            </p>
                            <div class="mt-2 text-xs text-gray-500">
                                Dilihat: {{ $berita->dilihat }}x
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $beritas->appends(['search' => request('search')])->links() }}
            </div>
        @else
            <p class="text-center text-gray-500 mt-16">Tidak ada berita ditemukan.</p>
        @endif
    </div>
</section>
@endsection
