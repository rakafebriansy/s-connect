@extends('layouts.app')

@section('title', 'Form Pengaduan Masyarakat')

@section('content')
<section class=" p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-6 text-blue-800 text-center">Form Pengaduan Masyarakat</h1>

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul Pengaduan</label>
                <input type="text" name="judul" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: Lampu Jalan Rusak">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi Pengaduan</label>
                <textarea name="isi" rows="5" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none"
                          placeholder="Jelaskan permasalahan yang terjadi..."></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Dusun</label>
                <input type="text" name="dusun" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none"
                       placeholder="Dusun tempat kejadian">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Jenis Pengaduan</label>
                <select name="jenis_pengaduan" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="umum">Umum</option>
                    <option value="fasilitas">Fasilitas</option>
                    <option value="sosial">Sosial</option>
                </select>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Kirim Pengaduan
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
