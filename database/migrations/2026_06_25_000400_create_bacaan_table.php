<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bacaan', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('gerakan_id')->constrained('gerakan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedTinyInteger('urutan')->default(1);
            $table->string('judul', 150);
            $table->longText('teks_arab');
            $table->longText('teks_latin');
            $table->longText('terjemahan');
            $table->text('terjemahan_ringkas');
            $table->string('audio_url', 500)->nullable();
            $table->string('sumber', 500);
            $table->timestamps();

            $table->unique(['gerakan_id', 'urutan']);
            $table->index(['gerakan_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bacaan');
    }
};
