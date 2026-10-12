<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->string('nama_guru', 40);
            $table->string('nip', 15)->unique();
            $table->unsignedInteger('id_mapel');
            $table->string('foto', 100);
            $table->timestamps();

            $table->foreign('id_mapel')
                ->references('id_mapel')
                ->on('mata_pelajaran')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
