<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin === true;
    }

    public function rules(): array
    {
        $kategori = $this->route('kategori');

        return [
            'nama' => ['required', 'string', 'max:60'],
            'slug' => ['required', 'alpha_dash', 'max:80', Rule::unique('kategori', 'slug')->ignore($kategori?->id)],
            'deskripsi' => ['required', 'string', 'max:500'],
            'warna' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama' => trim((string) $this->input('nama')),
            'slug' => strtolower(trim((string) $this->input('slug'))),
            'deskripsi' => trim((string) $this->input('deskripsi')),
            'warna' => strtoupper(trim((string) $this->input('warna'))),
        ]);
    }
}
