<?php

namespace Database\Seeders;

use App\Models\GambarWisata;
use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wisatas = [
            [
                'nama' => 'Pantai Pasir Putih',
                'longitude' => 114.59123,
                'latitude' => -8.23948,
            ],
            [
                'nama' => 'Air Terjun Bidadari',
                'longitude' => 114.62877,
                'latitude' => -8.21458,
            ],
            [
                'nama' => 'Bukit Cinta',
                'longitude' => 114.60119,
                'latitude' => -8.25103,
            ],
        ];

        foreach ($wisatas as $wisataData) {
            $wisata = Wisata::create($wisataData);

            for ($i = 1; $i <= 3; $i++) {
                GambarWisata::create([
                    'wisata_id' => $wisata->id,
                    'gambar' => "wisata/dummy_{$i}.jpg",
                ]);
            }
        }
    }
}
