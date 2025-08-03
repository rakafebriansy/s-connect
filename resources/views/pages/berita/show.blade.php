@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="md:col-span-3 bg-white rounded-2xl shadow-lg overflow-hidden">
        <img src="{{ asset('storage/' . $berita->gambar) }}"
             alt="{{ $berita->judul }}"
             class="w-full h-72 object-cover">

        <div class="p-6">
            <h1 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">
                {{ $berita->judul }}
            </h1>

            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span class="mr-4">📅 {{ $berita->created_at->format('d M Y') }}</span>
                <span>👁️ {{ $berita->dilihat }}x dilihat</span>
            </div>

            <div class="text-gray-700 leading-relaxed text-justify">
                {{ $berita->deskripsi }}
            </div>

            <div class="mt-6">
                <a href="{{ route('berita.index') }}"
                   class="inline-block bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    ← Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Berita Lainnya</h3>

        @foreach ($beritaLain as $lain)
            <a href="{{ route('berita.show', $lain->id) }}"
               class="block bg-gray-100 hover:bg-gray-200 rounded-lg p-3 transition">
                <div class="text-sm font-medium text-gray-800 truncate">
                    {{ $lain->judul }}
                </div>
                <div class="text-xs text-gray-500">
                    {{ $lain->created_at->format('d M Y') }}
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
