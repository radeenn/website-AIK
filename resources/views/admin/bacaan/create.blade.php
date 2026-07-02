@extends('layouts.admin')
@section('title','Tambah Bacaan') @section('page-title','Tambah Bacaan')
@section('content')<form method="POST" action="{{ route('admin.bacaan.store') }}" enctype="multipart/form-data" class="admin-form">@csrf @include('admin.bacaan._form')</form>@endsection
