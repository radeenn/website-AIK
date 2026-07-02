<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gerakan', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama', 150);
            $table->string('slug', 170);
            $table->unsignedTinyInteger('urutan');
            $table->text('deskripsi');
            $table->text('deskripsi_sederhana');
            $table->string('gambar_url', 500)->nullable();
            $table->string('video_url', 500)->nullable();
            $table->boolean('status_aktif')->default(true)->index();
            $table->timestamps();

            $table->unique(['kategori_id', 'slug']);
            $table->unique(['kategori_id', 'urutan']);
            $table->index(['kategori_id', 'status_aktif', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gerakan');
    }
};
