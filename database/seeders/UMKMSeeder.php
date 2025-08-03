<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('u_m_k_m_s')->insert([
            [
                'nama' => 'Warung Makan Sederhana',
                'longitude' => 110.3671,
                'latitude' => -7.7828,
                'nomor_telepon' => '081234567890',
                'terverifikasi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toko Oleh-Oleh Bu Rini',
                'longitude' => 110.3652,
                'latitude' => -7.7791,
                'nomor_telepon' => '085612345678',
                'terverifikasi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kerajinan Tangan Pak Budi',
                'longitude' => 110.3680,
                'latitude' => -7.7815,
                'nomor_telepon' => '082345678901',
                'terverifikasi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kopi Nusantara',
                'longitude' => 110.3701,
                'latitude' => -7.7842,
                'nomor_telepon' => '081278912345',
                'terverifikasi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Laundry Express Bersih',
                'longitude' => 110.3690,
                'latitude' => -7.7800,
                'nomor_telepon' => '089876543210',
                'terverifikasi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sentra Batik Indah',
                'longitude' => 110.3665,
                'latitude' => -7.7833,
                'nomor_telepon' => '087812345678',
                'terverifikasi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
