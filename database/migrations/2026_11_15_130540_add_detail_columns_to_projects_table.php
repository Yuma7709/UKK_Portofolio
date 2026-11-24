<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('projects', function (Blueprint $table) {
        $table->text('masalah')->nullable();
        $table->text('tujuan')->nullable();
        $table->string('peran')->nullable();
        $table->string('link_demo')->nullable();
        $table->string('link_github')->nullable();
        $table->text('dokumentasi')->nullable(); // satu langkah per baris
        $table->text('galeri')->nullable();      // nama file gambar, pisah koma
        $table->text('detail')->nullable();
    });
}

public function down(): void
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn(['masalah','tujuan','peran','link_demo','link_github','dokumentasi','galeri','detail']);
    });
}
};
