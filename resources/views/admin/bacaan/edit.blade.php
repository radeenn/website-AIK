@extends('layouts.admin')
@section('title','Edit Bacaan') @section('page-title','Edit Bacaan')
@section('content')<form method="POST" action="{{ route('admin.bacaan.update',$bacaan) }}" enctype="multipart/form-data" class="admin-form">@csrf @method('PUT') @include('admin.bacaan._form')</form>@endsection
