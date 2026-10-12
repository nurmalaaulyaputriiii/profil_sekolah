<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri')->insert([
            [
                'judul' => 'Kegiatan Upacara Bendera',
                'keterangan' => 'Dokumentasi kegiatan upacara bendera yang diikuti oleh seluruh warga sekolah.',
                'file' => 'galeri/upacara.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-01-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Pramuka',
                'keterangan' => 'Dokumentasi kegiatan Pramuka untuk melatih kedisiplinan dan kerja sama siswa.',
                'file' => 'galeri/pramuka.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Video Kegiatan Sekolah',
                'keterangan' => 'Video dokumentasi berbagai kegiatan yang dilaksanakan di lingkungan sekolah.',
                'file' => 'galeri/kegiatan.mp4',
                'kategori' => 'Video',
                'tanggal' => '2026-01-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
