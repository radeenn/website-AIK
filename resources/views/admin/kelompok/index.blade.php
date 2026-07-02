@extends('layouts.admin')
@section('title', 'Identitas Kelompok')
@section('page-title', 'Identitas Kelompok')
@section('content')
<div class="admin-toolbar"><div><p>Identitas ini tampil otomatis pada header halaman publik.</p></div><a href="{{ route('admin.kelompok.create') }}" class="btn-primary"><i data-lucide="plus" class="h-4 w-4"></i> Tambah Identitas</a></div>
<div class="admin-table-wrap mt-5"><table class="admin-table"><thead><tr><th>Nama Kelompok</th><th>Program Studi</th><th>Mata Kuliah</th><th>Dosen</th><th>Aksi</th></tr></thead><tbody>@forelse($items as $item)<tr><td><strong>{{ $item->nama_kelompok }}</strong></td><td>{{ $item->prodi }}</td><td>{{ $item->mata_kuliah }}</td><td>{{ $item->dosen }}</td><td><div class="table-actions"><a href="{{ route('admin.kelompok.edit',$item) }}" class="btn-table">Edit</a><form method="POST" action="{{ route('admin.kelompok.destroy',$item) }}" onsubmit="return confirm('Hapus identitas ini?')">@csrf @method('DELETE')<button class="btn-table danger">Hapus</button></form></div></td></tr>@empty<tr><td colspan="5" class="text-center text-slate-500">Belum ada identitas kelompok.</td></tr>@endforelse</tbody></table></div><div class="mt-5">{{ $items->links() }}</div>
@endsection
