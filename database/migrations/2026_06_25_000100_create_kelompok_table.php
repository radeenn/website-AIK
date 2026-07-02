<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kelompok', function (Blueprint $table): void {
            $table->id();
            $table->string('nama_kelompok', 100);
            $table->string('prodi', 150);
            $table->string('mata_kuliah', 180);
            $table->string('dosen', 150);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelompok');
    }
};
