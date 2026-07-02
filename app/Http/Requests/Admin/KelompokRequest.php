<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KelompokRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin === true;
    }

    public function rules(): array
    {
        return [
            'nama_kelompok' => ['required', 'string', 'max:100'],
            'prodi' => ['required', 'string', 'max:150'],
            'mata_kuliah' => ['required', 'string', 'max:180'],
            'dosen' => ['required', 'string', 'max:150'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(collect($this->only(['nama_kelompok', 'prodi', 'mata_kuliah', 'dosen']))
            ->map(fn ($value) => is_string($value) ? trim($value) : $value)->all());
    }
}
