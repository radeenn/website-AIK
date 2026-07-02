<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BacaanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin === true;
    }

    public function rules(): array
    {
        return [
            'gerakan_id' => ['required', 'exists:gerakan,id'],
            'urutan' => ['required', 'integer', 'min:1', 'max:20'],
            'judul' => ['required', 'string', 'max:150'],
            'teks_arab' => ['required', 'string', 'max:3000'],
            'teks_latin' => ['required', 'string', 'max:3000'],
            'terjemahan' => ['required', 'string', 'max:3000'],
            'terjemahan_ringkas' => ['required', 'string', 'max:1500'],
            'audio' => [$this->route('bacaan') ? 'nullable' : 'required', 'file', 'mimes:mp3', 'max:10240'],
            'sumber' => ['required', 'string', 'max:500'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $fields = ['judul', 'teks_arab', 'teks_latin', 'terjemahan', 'terjemahan_ringkas', 'sumber'];
        $payload = [];
        foreach ($fields as $field) {
            $payload[$field] = trim((string) $this->input($field));
        }
        $this->merge($payload);
    }
}
