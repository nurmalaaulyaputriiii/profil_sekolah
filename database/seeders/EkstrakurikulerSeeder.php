<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ekstrakurikuler')->insert([
            [
                'nama_ekskul' => 'Futsal',
                'slug' => 'futsal',
                'pembina' => 'Dedi Kurniawan',
                'jadwal_latihan' => 'Rabu, 15.30',
                'deskripsi' => 'Kegiatan olahraga untuk meningkatkan kebugaran, kerja sama tim, dan sportivitas.',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
