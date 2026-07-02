@extends('layouts.admin')
@section('title','Tambah Kategori') @section('page-title','Tambah Kategori')
@section('content')<form method="POST" action="{{ route('admin.kategori.store') }}" class="admin-form">@csrf @include('admin.kategori._form')</form>@endsection
