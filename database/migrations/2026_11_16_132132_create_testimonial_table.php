<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');              // guru | teman | pengguna | pkl
            $table->string('nama', 100);
            $table->string('jabatan', 150)->nullable(); // contoh: Guru Produktif PPLG / Pembimbing PKL di PT ...
            $table->text('isi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};