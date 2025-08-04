@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Potensi UMKM Desa</h1>

        <!-- Search Bar -->
        <form action="{{ route('potensi.index') }}" method="GET" class="flex items-center max-w-md mx-auto mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari potensi UMKM..."
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-r-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </form>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($potensis as $potensi)
                <div class="bg-white rounded-xl shadow p-4">
                    <!-- Image Slider -->
                    <div class="swiper-container swiper-{{ $potensi->id }} overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($potensi->gambar_potensis as $gambar)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gambar->gambar) }}"
                                        class="w-full h-48 object-cover rounded-lg" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold mt-4">{{ $potensi->nama }}</h2>
                    <p class="text-gray-600">Rp{{ number_format($potensi->harga, 0, ',', '.') }} / {{ $potensi->satuan }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">UMKM: {{ $potensi->u_m_k_m->nama }}</p>

                    <div class="flex gap-2 mt-4">
                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $potensi->u_m_k_m->nomor_telepon) }}"
                            target="_blank"
                            class="flex-1 text-center bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Beli Sekarang
                        </a>

                        <!-- Tombol Lokasi -->
                        <button onclick="showMap({{ $potensi->u_m_k_m->latitude }}, {{ $potensi->u_m_k_m->longitude }})"
                            class="flex-1 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Lokasi
                        </button>
                    </div>
                </div>
            @empty
                <p>Tidak ada data potensi.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $potensis->links() }}
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
        // Inisialisasi Swiper untuk setiap potensi
        @foreach ($potensis as $potensi)
            new Swiper('.swiper-{{ $potensi->id }}', {
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
