@extends('layouts.admin')
@section('title','Edit Gerakan') @section('page-title','Edit Gerakan')
@section('content')<form method="POST" action="{{ route('admin.gerakan.update',$gerakan) }}" enctype="multipart/form-data" class="admin-form">@csrf @method('PUT') @include('admin.gerakan._form')</form>@endsection
