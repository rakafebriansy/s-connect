<?php

namespace Database\Seeders;

use App\Models\GambarPotensi;
use App\Models\Potensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GambarPotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $potensis = Potensi::all();
        foreach ($potensis as $potensi) {
            for ($i = 0; $i < 3; $i++) {
                GambarPotensi::create([
                    'potensi_id' => $potensi->id,
                    'gambar' => 'umkm/dummy_' . $i . '.jpg'
                ]);
            }
        }
    }
}
