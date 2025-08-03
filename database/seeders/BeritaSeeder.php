<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        for ($i = 0; $i < 20; $i++) {
            DB::table('beritas')->insert([
                'user_id' => $user->id, 
                'judul' => fake()->sentence(6),
                'deskripsi' => fake()->paragraph(3),
                'gambar' => 'berita/dummy_' . rand(1,3) . '.jpg', 
                'dilihat' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
