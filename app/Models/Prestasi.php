<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';

    protected $primaryKey = 'id_prestasi';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nama_prestasi',
        'slug',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}
