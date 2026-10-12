<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prestasis')->insert([
            [
                'nama_prestasi' => 'Juara 1 Lomba Cerdas Cermat',
                'slug' => 'juara-1-lomba-cerdas-cermat',
                'deskripsi' => 'Siswa berhasil meraih juara pertama dalam lomba cerdas cermat tingkat sekolah.',
                'foto' => null,
                'tahun_ajaran' => '2025/2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prestasi' => 'Juara 2 Lomba Paskibra',
                'slug' => 'juara-2-lomba-paskibra',
                'deskripsi' => 'Tim Paskibra berhasil meraih juara kedua dalam perlombaan baris-berbaris.',
                'foto' => null,
                'tahun_ajaran' => '2025/2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prestasi' => 'Juara 3 Turnamen Futsal',
                'slug' => 'juara-3-turnamen-futsal',
                'deskripsi' => 'Tim futsal sekolah meraih juara ketiga dalam turnamen antarsekolah.',
                'foto' => null,
                'tahun_ajaran' => '2025/2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
