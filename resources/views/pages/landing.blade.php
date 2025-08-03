@extends('layouts.app')

@section('title')
    S-Connect
@endsection

@section('content')
    <!-- Hero Image -->
    <div class="w-full relative">
        <img src="{{ asset('images/landing.webp') }}" alt="" class="w-full h-[60vh] md:h-screen object-cover">
        <div class="absolute top-0 left-0 w-full h-full bg-black/35"></div>
    </div>

    <!-- Intro Section -->
    <div class="w-full flex flex-col lg:flex-row items-center justify-center px-6 py-12 gap-8 container mx-auto">
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-4xl font-bold mb-4">Jelajahi Desa</h1>
            <p class="text-gray-600 text-lg">
                Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa:
                aspek pemerintahan, potensi desa, pusat pengaduan, dan juga berita tentang Desa.
            </p>
        </div>

        <div class="lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Reuseable Cards -->
            <x-info-card href="/profil" icon="🏛️" color="blue" title="Pemerintahan" />
            <x-info-card href="/potensi" icon="🌱" color="green" title="Potensi Desa" />
            <x-info-card href="/pengaduan" icon="📢" color="red" title="Pusat Pengaduan" />
            <x-info-card href="/berita" icon="📰" color="yellow" title="Berita" />
        </div>
    </div>

    <!-- Section: Berita -->
    <section class="px-4 md:px-6 lg:px-12 pb-12">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-center md:text-left">Berita Terbaru</h1>
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
    </section>
@endsection
