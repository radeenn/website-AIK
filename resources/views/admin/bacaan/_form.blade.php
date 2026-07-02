<div x-data="mediaPreview({ audio: @js(isset($bacaan) ? $bacaan->audio_src : null) })" class="grid gap-5">
    <div class="grid gap-5 md:grid-cols-2">
        <label class="form-field md:col-span-2"><span class="form-label">Gerakan <b>*</b></span><select name="gerakan_id" class="form-control" required><option value="">Pilih gerakan</option>@foreach($movements as $movement)<option value="{{ $movement->id }}" {{ (string) old('gerakan_id',$bacaan->gerakan_id ?? '') === (string)$movement->id ? 'selected' : '' }}>{{ $movement->kategori?->nama }} — {{ $movement->urutan }}. {{ $movement->nama }}</option>@endforeach</select>@error('gerakan_id')<span class="form-error">{{ $message }}</span>@enderror</label>
        <x-form-input label="Judul Bacaan" name="judul" :value="$bacaan->judul ?? ''" required />
        <x-form-input label="Urutan Bacaan" name="urutan" type="number" :value="$bacaan->urutan ?? 1" min="1" max="20" required />
    </div>
    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4 text-sm leading-7 text-amber-900"><strong>Peringatan konten:</strong> Jangan memasukkan bacaan secara acak dari internet. Seluruh teks wajib diverifikasi dari sumber resmi HPT Muhammadiyah sebelum publikasi.</div>
    <label class="form-field"><span class="form-label">Teks Arab <b>*</b></span><textarea dir="rtl" lang="ar" name="teks_arab" rows="5" class="form-control arabic-text" required>{{ old('teks_arab',$bacaan->teks_arab ?? '[Masukkan teks Arab yang telah diverifikasi dari HPT Muhammadiyah]') }}</textarea>@error('teks_arab')<span class="form-error">{{ $message }}</span>@enderror</label>
    <x-form-input label="Transliterasi Latin" name="teks_latin" type="textarea" :value="$bacaan->teks_latin ?? '[Masukkan transliterasi resmi]'" required />
    <x-form-input label="Terjemahan Lengkap" name="terjemahan" type="textarea" :value="$bacaan->terjemahan ?? '[Masukkan terjemahan resmi]'" required />
    <x-form-input label="Terjemahan Ringkas untuk Anak" name="terjemahan_ringkas" type="textarea" :value="$bacaan->terjemahan_ringkas ?? '[Masukkan terjemahan ringkas yang tetap mempertahankan makna]'" required />
    <x-form-input label="Sumber" name="sumber" :value="$bacaan->sumber ?? 'Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat'" required />
    <label class="form-field"><span class="form-label">File Audio MP3 {{ isset($bacaan) ? '' : '*' }}</span><input @change="previewAudio($event)" type="file" name="audio" accept="audio/mpeg,.mp3" class="form-control" {{ isset($bacaan) ? '' : 'required' }}><span class="form-hint">MP3 maksimal 10 MB.</span>@error('audio')<span class="form-error">{{ $message }}</span>@enderror<div x-show="audio" class="mt-3"><audio :src="audio" controls class="w-full"></audio></div></label>
</div>
<div class="form-actions"><a href="{{ route('admin.bacaan.index') }}" class="btn-secondary">Batal</a><button class="btn-primary" type="submit">Simpan Bacaan</button></div>
