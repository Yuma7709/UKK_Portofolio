<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('experiences', function (Blueprint $table) {
        $table->id();
        $table->string('kategori');                   // pkl | organisasi | lomba
        $table->string('judul');                      // jabatan / posisi / nama lomba
        $table->string('instansi');                   // perusahaan / organisasi / penyelenggara
        $table->string('periode')->nullable();        // contoh: Jan 2026 - Mar 2026
        $table->string('hasil')->nullable();          // khusus lomba: Juara 1, Finalis, dll
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('experiences');
}
};
