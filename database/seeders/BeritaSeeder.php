<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Kegiatan Belajar di Sekolah',
                'slug' => 'kegiatan-belajar-di-sekolah',
                'isi' => 'Kegiatan pembelajaran dilaksanakan untuk meningkatkan pengetahuan dan keterampilan siswa.',
                'tanggal' => '2026-01-15',
                'gambar' => null,
                'status' => 'Publish',
            ],
            [
                'judul' => 'Persiapan Lomba Sekolah',
                'slug' => 'persiapan-lomba-sekolah',
                'isi' => 'Sekolah mempersiapkan siswa untuk mengikuti berbagai perlombaan sesuai bidang keahliannya.',
                'tanggal' => '2026-01-20',
                'gambar' => null,
                'status' => 'Draft',
            ],
        ];

        foreach ($data as $item) {
            $item['id_user'] = DB::table('user')
                ->where('username', 'admin')
                ->value('id_user');

            $item['updated_at'] = now();

            DB::table('beritas')->updateOrInsert(
                ['slug' => $item['slug']],
                array_merge($item, ['created_at' => now()])
            );
        }
    }
}
