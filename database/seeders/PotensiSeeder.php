<?php

namespace Database\Seeders;

use App\Models\UMKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $potensiList = [
            ['nama' => 'Keripik Singkong', 'harga' => 15000, 'satuan' => 'bungkus'],
            ['nama' => 'Kopi Robusta Bubuk', 'harga' => 30000, 'satuan' => 'pak'],
            ['nama' => 'Tas Anyaman', 'harga' => 50000, 'satuan' => 'buah'],
            ['nama' => 'Batik Tulis', 'harga' => 150000, 'satuan' => 'lembar'],
            ['nama' => 'Sabun Herbal', 'harga' => 25000, 'satuan' => 'batang'],
            ['nama' => 'Minyak Kelapa', 'harga' => 20000, 'satuan' => 'liter'],
            ['nama' => 'Kerajinan Kayu', 'harga' => 80000, 'satuan' => 'unit'],
            ['nama' => 'Pupuk Organik', 'harga' => 10000, 'satuan' => 'kg'],
            ['nama' => 'Jamu Tradisional', 'harga' => 15000, 'satuan' => 'botol'],
            ['nama' => 'Kue Kering', 'harga' => 40000, 'satuan' => 'toples'],
            ['nama' => 'Madu Hutan', 'harga' => 60000, 'satuan' => 'botol'],
            ['nama' => 'Keripik Pisang', 'harga' => 12000, 'satuan' => 'bungkus'],
            ['nama' => 'Teh Herbal', 'harga' => 18000, 'satuan' => 'pak'],
            ['nama' => 'Sambal Botol', 'harga' => 22000, 'satuan' => 'botol'],
            ['nama' => 'Kopi Arabika', 'harga' => 35000, 'satuan' => 'pak'],
        ];

        $umkms = UMKM::get();

        foreach ($potensiList as $item) {
            DB::table('potensis')->insert([
                'u_m_k_m_id' => $umkms->random()->id,
                'nama' => $item['nama'],
                'harga' => $item['harga'],
                'satuan' => $item['satuan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
