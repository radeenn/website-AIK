<div x-data="mediaPreview({ image: @js(isset($gerakan) ? $gerakan->gambar_src : null), video: @js(isset($gerakan) ? $gerakan->video_src : null) })" class="grid gap-6">
    <div class="grid gap-5 md:grid-cols-2">
        <label class="form-field"><span class="form-label">Kategori <b>*</b></span><select name="kategori_id" class="form-control" required><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" {{ (string) old('kategori_id',$gerakan->kategori_id ?? '') === (string) $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>@endforeach</select>@error('kategori_id')<span class="form-error">{{ $message }}</span>@enderror</label>
        <x-form-input label="Nomor Urutan" name="urutan" type="number" :value="$gerakan->urutan ?? ''" min="1" max="99" required />
        <x-form-input label="Nama Gerakan" name="nama" :value="$gerakan->nama ?? ''" required />
        <x-form-input label="Slug" name="slug" :value="$gerakan->slug ?? ''" required hint="Harus unik dalam kategori." />
        <div class="md:col-span-2"><x-form-input label="Deskripsi Dewasa" name="deskripsi" type="textarea" :value="$gerakan->deskripsi ?? ''" required /></div>
        <div class="md:col-span-2"><x-form-input label="Deskripsi Sederhana untuk Anak" name="deskripsi_sederhana" type="textarea" :value="$gerakan->deskripsi_sederhana ?? ''" required /></div>
    </div>

    <div class="grid gap-5 lg:grid-cols-2">
        <label class="form-field"><span class="form-label">Gambar Gerakan {{ isset($gerakan) ? '' : '*' }}</span><input @change="previewImage($event)" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp" class="form-control" {{ isset($gerakan) ? '' : 'required' }}><span class="form-hint">JPG, JPEG, PNG, atau WebP. Maksimal 5 MB.</span>@error('gambar')<span class="form-error">{{ $message }}</span>@enderror<div x-show="image" class="media-preview"><img :src="image" alt="Preview gambar"></div></label>
        <label class="form-field"><span class="form-label">Video MP4</span><input @change="previewVideo($event)" type="file" name="video_file" accept="video/mp4" class="form-control"><span class="form-hint">MP4 maksimal 50 MB. Upload akan menggantikan URL video.</span>@error('video_file')<span class="form-error">{{ $message }}</span>@enderror<div x-show="video" class="media-preview"><video :src="video" controls></video></div></label>
    </div>
    <x-form-input label="URL Video Eksternal" name="video_url" type="url" :value="isset($gerakan) && str_starts_with((string)$gerakan->video_url, 'http') ? $gerakan->video_url : ''" hint="Opsional. Gunakan URL HTTPS yang sah." />
    <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4"><input type="checkbox" name="status_aktif" value="1" {{ old('status_aktif',$gerakan->status_aktif ?? true) ? 'checked' : '' }} class="h-5 w-5 rounded border-slate-300 text-emerald-700 focus:ring-emerald-600"><span><strong class="block text-sm">Aktifkan gerakan</strong><small class="text-slate-500">Hanya gerakan aktif yang tampil pada halaman publik.</small></span></label>
</div>
<div class="form-actions"><a href="{{ route('admin.gerakan.index') }}" class="btn-secondary">Batal</a><button class="btn-primary" type="submit">Simpan Gerakan</button></div>
