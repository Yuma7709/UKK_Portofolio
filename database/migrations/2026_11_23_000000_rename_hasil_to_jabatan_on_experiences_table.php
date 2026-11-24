<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->renameColumn('hasil', 'jabatan');
            $table->string('judul')->nullable()->change();
        });

        DB::table('experiences')->where('kategori', '!=', 'kepanitiaan')->update(['judul' => null]);
    }

    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->renameColumn('jabatan', 'hasil');
        });
    }
};
