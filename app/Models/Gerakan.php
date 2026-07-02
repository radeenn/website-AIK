<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Gerakan extends Model
{
    use HasFactory;

    protected $table = 'gerakan';

    protected $fillable = [
        'kategori_id', 'nama', 'slug', 'urutan', 'deskripsi',
        'deskripsi_sederhana', 'gambar_url', 'video_url', 'status_aktif',
    ];

    protected function casts(): array
    {
        return ['status_aktif' => 'boolean'];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function bacaan(): HasMany
    {
        return $this->hasMany(Bacaan::class)->orderBy('urutan');
    }

    public function getGambarSrcAttribute(): string
    {
        return $this->mediaUrl($this->gambar_url) ?: asset('images/placeholder-movement.svg');
    }

    public function getVideoSrcAttribute(): ?string
    {
        return $this->mediaUrl($this->video_url);
    }

    private function mediaUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return Str::startsWith($path, ['http://', 'https://']) ? $path : Storage::disk('public')->url($path);
    }
}
