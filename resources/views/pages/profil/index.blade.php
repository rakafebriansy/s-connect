@extends('layouts.app')

@section('title', 'Profil Desa')

@section('content')
    <section class="py-12">
        <div class="max-w-5xl mx-auto p-4">
            <!-- Judul -->
            <h1 class="text-4xl font-bold mb-12 text-blue-800 text-center">Profil Desa Sawaran Lor</h1>

            <!-- Sejarah -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4 text-blue-700">Sejarah Desa</h2>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Desa Sawaran Lor berdiri sejak zaman penjajahan Belanda, awalnya merupakan pemukiman kecil yang
                    berkembang karena pertanian dan perdagangan lokal. Kini, desa ini menjadi pusat pertumbuhan ekonomi
                    masyarakat sekitar dengan berbagai potensi unggulan di bidang pertanian, UMKM, dan pariwisata lokal.
                </p>
            </div>

            <!-- Visi -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4 text-blue-700">Visi</h2>
                <p class="italic text-gray-800">"Mewujudkan Desa Sawaran Lor yang mandiri, sejahtera, dan berdaya saing
                    berbasis potensi lokal dan partisipasi masyarakat."</p>
            </div>

            <!-- Misi -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4 text-blue-700">Misi</h2>
                <ul class="list-disc ml-6 text-gray-700 space-y-2">
                    <li>Meningkatkan kualitas layanan publik desa berbasis teknologi.</li>
                    <li>Mendorong pembangunan infrastruktur desa yang merata.</li>
                    <li>Mengembangkan potensi ekonomi lokal, khususnya UMKM dan pertanian.</li>
                    <li>Menumbuhkan kesadaran masyarakat terhadap lingkungan dan kebersamaan.</li>
                    <li>Mengoptimalkan partisipasi pemuda dalam pembangunan desa.</li>
                </ul>
            </div>

            <!-- Peta Lokasi -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4 text-blue-700">Peta Lokasi Desa</h2>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31609.169451652913!2d113.17601927995959!3d-7.983835540645083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd65ab3edd956d1%3A0xd71adf07f2c15788!2sSawaran%20Lor%2C%20Klakah%2C%20Lumajang%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1754299313030!5m2!1sen!2sid"
                        width="100%" height="400" class="rounded-lg border-2 border-blue-200" allowfullscreen=""
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Infografis -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold mb-6 text-blue-700">Infografis Desa</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-blue-800">2.134</h3>
                        <p class="text-gray-600">Jumlah Penduduk</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-green-800">800 KK</h3>
                        <p class="text-gray-600">Jumlah Kepala Keluarga</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-yellow-800">12</h3>
                        <p class="text-gray-600">RT</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-red-800">3</h3>
                        <p class="text-gray-600">RW</p>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-purple-800">4 Ha</h3>
                        <p class="text-gray-600">Luas Wilayah</p>
                    </div>
                    <div class="bg-indigo-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-indigo-800">80%</h3>
                        <p class="text-gray-600">Lahan Pertanian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
