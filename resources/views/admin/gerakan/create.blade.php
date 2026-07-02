@extends('layouts.admin')
@section('title','Tambah Gerakan') @section('page-title','Tambah Gerakan')
@section('content')<form method="POST" action="{{ route('admin.gerakan.store') }}" enctype="multipart/form-data" class="admin-form">@csrf @include('admin.gerakan._form')</form>@endsection
