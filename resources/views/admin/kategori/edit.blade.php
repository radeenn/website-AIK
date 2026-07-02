@extends('layouts.admin')
@section('title','Edit Kategori') @section('page-title','Edit Kategori')
@section('content')<form method="POST" action="{{ route('admin.kategori.update',$kategori) }}" class="admin-form">@csrf @method('PUT') @include('admin.kategori._form')</form>@endsection
