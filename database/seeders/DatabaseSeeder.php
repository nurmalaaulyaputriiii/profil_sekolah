<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SiswaSeeder::class,
            GuruSeeder::class,
            BeritaSeeder::class,
            EkstrakurikulerSeeder::class,
            GaleriSeeder::class,
            PrestasiSeeder::class,
            PengumumanSeeder::class,
            ProfilSekolahSeeder::class,
        ]);
    }
}
