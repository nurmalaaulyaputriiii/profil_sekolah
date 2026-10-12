<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->updateOrInsert(
            ['username' => 'admin'],
            [
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('user')->updateOrInsert(
            ['username' => 'operator'],
            [
                'password' => Hash::make('operator123'),
                'role' => 'Operator',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
