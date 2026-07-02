@extends('layouts.admin')
@section('title','Edit Identitas') @section('page-title','Edit Identitas Kelompok')
@section('content')<form method="POST" action="{{ route('admin.kelompok.update',$kelompok) }}" class="admin-form">@csrf @method('PUT') @include('admin.kelompok._form')</form>@endsection
