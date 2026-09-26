<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    // /** @use HasFactory<\Database\Factories\PrestasiFactory> */
    protected $table = 'prestasis';

    protected $primaryKey = 'id_prestasi';

    protected $fillable = [
        'nama_prestasi',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}

