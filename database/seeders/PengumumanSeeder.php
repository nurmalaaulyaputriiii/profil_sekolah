<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengumumen')->insert([
            [
                'judul' => 'Informasi Kegiatan Sekolah',
                'slug' => 'informasi-kegiatan-sekolah',
                'isi' => 'Seluruh siswa diharapkan mengikuti kegiatan sekolah sesuai jadwal yang telah ditentukan.',
                'tanggal' => '2026-01-12',
                'status' => 'Publish',
                'id_user' => DB::table('user')->where('username', 'admin')->value('id_user'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Jadwal Ujian Sekolah',
                'slug' => 'jadwal-ujian-sekolah',
                'isi' => 'Siswa diharapkan mempersiapkan diri dan mengikuti ujian sesuai jadwal yang ditetapkan oleh sekolah.',
                'tanggal' => '2026-01-15',
                'status' => 'Publish',
                'id_user' => DB::table('user')->where('username', 'admin')->value('id_user'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Persiapan Kegiatan Sekolah',
                'slug' => 'persiapan-kegiatan-sekolah',
                'isi' => 'Informasi lebih lanjut mengenai kegiatan sekolah akan disampaikan melalui pengumuman berikutnya.',
                'tanggal' => '2026-01-20',
                'status' => 'Draft',
                'id_user' => DB::table('user')->where('username', 'admin')->value('id_user'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
