<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GerakanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin === true;
    }

    public function rules(): array
    {
        $gerakan = $this->route('gerakan');

        return [
            'kategori_id' => ['required', 'exists:kategori,id'],
            'nama' => ['required', 'string', 'max:150'],
            'slug' => [
                'required', 'alpha_dash', 'max:170',
                Rule::unique('gerakan', 'slug')->where(fn ($query) => $query->where('kategori_id', $this->integer('kategori_id')))->ignore($gerakan?->id),
            ],
            'urutan' => ['required', 'integer', 'min:1', 'max:99'],
            'deskripsi' => ['required', 'string', 'max:1500'],
            'deskripsi_sederhana' => ['required', 'string', 'max:1000'],
            'gambar' => [$gerakan ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'video_file' => ['nullable', 'file', 'mimes:mp4', 'max:51200'],
            'video_url' => ['nullable', 'url:http,https', 'max:500'],
            'status_aktif' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama' => trim((string) $this->input('nama')),
            'slug' => strtolower(trim((string) $this->input('slug'))),
            'deskripsi' => trim((string) $this->input('deskripsi')),
            'deskripsi_sederhana' => trim((string) $this->input('deskripsi_sederhana')),
            'video_url' => $this->filled('video_url') ? trim((string) $this->input('video_url')) : null,
            'status_aktif' => $this->boolean('status_aktif'),
        ]);
    }
}
