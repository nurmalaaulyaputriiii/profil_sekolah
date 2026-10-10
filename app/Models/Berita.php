<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Berita extends Model
{
    protected $table = 'beritas';

    protected $primaryKey = 'id_berita';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'id_user',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }
}
