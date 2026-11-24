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
    Schema::create('achievements', function (Blueprint $table) {
        $table->id();
        $table->string('kategori');                 // sertifikat
        $table->string('judul');
        $table->string('penyelenggara')->nullable(); // penerbit sertifikat
        $table->string('tahun', 10)->nullable();
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->string('link')->nullable();          // link verifikasi / tautan terkait
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('achievements');
}

};
