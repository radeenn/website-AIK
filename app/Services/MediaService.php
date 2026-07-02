<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class MediaService
{
    public function store(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    public function storeImageAsWebp(UploadedFile $file, string $directory): string
    {
        if (function_exists('imagecreatefromstring') && function_exists('imagewebp')) {
            try {
                $image = imagecreatefromstring((string) file_get_contents($file->getRealPath()));
                if ($image !== false) {
                    ob_start();
                    imagepalettetotruecolor($image);
                    imagewebp($image, null, 82);
                    $binary = ob_get_clean();
                    imagedestroy($image);

                    if ($binary !== false) {
                        $path = trim($directory, '/').'/'.Str::uuid().'.webp';
                        Storage::disk('public')->put($path, $binary);
                        return $path;
                    }
                }
            } catch (Throwable) {
                // Fallback ke file asli jika GD tidak tersedia atau konversi gagal.
            }
        }

        return $this->store($file, $directory);
    }

    public function delete(?string $path): void
    {
        if ($path && ! Str::startsWith($path, ['http://', 'https://'])) {
            Storage::disk('public')->delete($path);
        }
    }
}
