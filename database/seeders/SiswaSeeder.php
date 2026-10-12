<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nisn' => '0123456789',
                'nama_siswa' => 'Andi Saputra',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2024,
            ],
            [
                'nisn' => '0123456790',
                'nama_siswa' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2024,
            ],
            [
                'nisn' => '0123456791',
                'nama_siswa' => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2025,
            ],
            [
                'nisn' => '0123456792',
                'nama_siswa' => 'Dewi Lestari',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2025,
            ],
            [
                'nisn' => '0123456793',
                'nama_siswa' => 'Rizky Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2026,
            ],
        ]);
    }
}
