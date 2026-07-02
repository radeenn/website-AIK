<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table): void {
            $table->id();
            $table->string('nama', 60);
            $table->string('slug', 80)->unique();
            $table->text('deskripsi');
            $table->char('warna', 7)->default('#087A5B');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
