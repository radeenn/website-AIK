<div class="grid gap-5 md:grid-cols-2">
    <x-form-input label="Nama Kelompok" name="nama_kelompok" :value="$kelompok->nama_kelompok ?? ''" required />
    <x-form-input label="Program Studi" name="prodi" :value="$kelompok->prodi ?? 'Manajemen Bisnis Syariah'" required />
    <x-form-input label="Mata Kuliah" name="mata_kuliah" :value="$kelompok->mata_kuliah ?? 'Pengembangan Aplikasi Web / Praktikum Pemrograman Web'" required />
    <x-form-input label="Dosen" name="dosen" :value="$kelompok->dosen ?? 'Dedy Susanto, S.Pd.I., M.M.'" required />
</div>
<div class="form-actions"><a href="{{ route('admin.kelompok.index') }}" class="btn-secondary">Batal</a><button class="btn-primary" type="submit">Simpan Identitas</button></div>
