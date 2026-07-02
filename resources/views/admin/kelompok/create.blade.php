@extends('layouts.admin')
@section('title','Tambah Identitas') @section('page-title','Tambah Identitas Kelompok')
@section('content')<form method="POST" action="{{ route('admin.kelompok.store') }}" class="admin-form">@csrf @include('admin.kelompok._form')</form>@endsection
