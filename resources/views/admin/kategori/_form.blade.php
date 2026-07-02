<div class="grid gap-5 md:grid-cols-2">
    <x-form-input label="Nama Kategori" name="nama" :value="$kategori->nama ?? ''" required />
    <x-form-input label="Slug" name="slug" :value="$kategori->slug ?? ''" required hint="Gunakan huruf kecil dan tanda hubung, misalnya anak-anak." />
    <div class="md:col-span-2"><x-form-input label="Deskripsi" name="deskripsi" type="textarea" :value="$kategori->deskripsi ?? ''" required /></div>
    <x-form-input label="Warna Tema" name="warna" type="color" :value="$kategori->warna ?? '#087A5B'" required />
</div>
<div class="form-actions"><a href="{{ route('admin.kategori.index') }}" class="btn-secondary">Batal</a><button class="btn-primary" type="submit">Simpan Kategori</button></div>
