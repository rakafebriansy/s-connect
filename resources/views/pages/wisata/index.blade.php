@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Potensi Wisata Desa</h1>

        <!-- Search Bar -->
        <form action="{{ route('wisata.index') }}" method="GET" class="flex items-center max-w-md mx-auto mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari potensi wisata..."
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-r-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </form>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($wisatas as $wisata)
                <div class="bg-white rounded-xl shadow p-4">
                    <!-- Image Slider -->
                    <div class="swiper-container swiper-{{ $wisata->id }} overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($wisata->gambar_wisatas as $gambar)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gambar->gambar) }}"
                                        class="w-full h-48 object-cover rounded-lg" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold mt-4">{{ $wisata->nama }}</h2>

                    <div class="flex gap-2 mt-4">
                        <!-- Tombol Lokasi -->
                        <button onclick="showMap({{ $wisata->latitude }}, {{ $wisata->longitude }})"
                            class="flex-1 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Lokasi
                        </button>
                    </div>
                </div>
            @empty
                <p>Tidak ada data wisata.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $wisatas->links() }}
        </div>
    </div>

    <!-- Modal Lokasi -->
    <div id="mapModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-full max-w-xl p-6 relative">
            <button onclick="closeMap()" class="absolute top-2 right-2 text-sm font-bold">✖</button>
            <iframe id="mapIframe" class="w-full h-96 rounded-lg" src="" allowfullscreen="" loading="lazy"></iframe>
            <div class="mt-4 text-right">
                <a id="gmapsLink" href="#" target="_blank"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Lihat di Peta / Gmaps
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script>
        @foreach ($wisatas as $wisata)
            new Swiper('.swiper-{{ $wisata->id }}', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        @endforeach

        function showMap(lat, lng) {
            const embedUrl = `https://maps.google.com/maps?q=${lat},${lng}&z=15&output=embed`;
            const gmapsUrl = `https://maps.google.com/?q=${lat},${lng}`;

            document.getElementById('mapIframe').src = embedUrl;
            document.getElementById('gmapsLink').href = gmapsUrl; 
            document.getElementById('mapModal').classList.remove('hidden');
        }

        function closeMap() {
            document.getElementById('mapModal').classList.add('hidden');
            document.getElementById('mapIframe').src = '';
        }
    </script>
@endpush
