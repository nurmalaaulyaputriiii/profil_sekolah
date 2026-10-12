<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'nama_guru' => 'Ahmad Fauzi',
                'nip' => '198501012010011',
                'mapel' => 'Matematika',
                'foto' => 'guru/logo2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Siti Aminah',
                'nip' => '198702152012012',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'guru/logo2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Budi Santoso',
                'nip' => '199003102015031',
                'mapel' => 'Bahasa Inggris',
                'foto' => 'guru/logo2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
