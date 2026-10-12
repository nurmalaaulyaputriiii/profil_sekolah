<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profil_sekolah')->insert([
            [
                'nama_sekolah' => 'SMAN 2 Singaparna',
                'kepala_sekolah' => 'Nama Kepala Sekolah',
                'foto' => 'foto_profil/smandas.png',
                'logo' => 'logo_profil/logo2.png',
                'npsn' => '20212345',
                'alamat' => 'Singaparna, Kabupaten Tasikmalaya, Jawa Barat',
                'kontak' => '081234567890',
                'visi_misi' => 'Visi: Mewujudkan peserta didik yang berprestasi, berkarakter, dan bertanggung jawab. Misi: Meningkatkan kualitas pembelajaran serta mengembangkan potensi dan kedisiplinan siswa.',
                'tahun_berdiri' => 2000,
                'deskripsi' => 'SMAN 2 Singaparna merupakan sekolah yang berkomitmen memberikan pendidikan berkualitas serta mendukung pengembangan potensi akademik dan nonakademik peserta didik.',
            ],
        ]);
    }
}
