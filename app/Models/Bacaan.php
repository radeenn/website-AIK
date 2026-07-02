<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Bacaan extends Model
{
    use HasFactory;

    protected $table = 'bacaan';

    protected $fillable = [
        'gerakan_id', 'urutan', 'judul', 'teks_arab', 'teks_latin',
        'terjemahan', 'terjemahan_ringkas', 'audio_url', 'sumber',
    ];

    public function gerakan(): BelongsTo
    {
        return $this->belongsTo(Gerakan::class);
    }

    public function getAudioSrcAttribute(): ?string
    {
        if (! $this->audio_url) {
            return null;
        }

        return Str::startsWith($this->audio_url, ['http://', 'https://'])
            ? $this->audio_url
            : Storage::disk('public')->url($this->audio_url);
    }
}
