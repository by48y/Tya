@extends('admin.cv.layout')

@section('title', 'Edit Portfolio')
@section('content')
<h1 class="h3 mb-3">Edit Portfolio: {{ $cv->judul }}</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('cv.portfolio.update', [$cv, $portfolio]) }}">
    @csrf @method('PUT') @include('admin.cv.portfolio-form')
    <button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-secondary" href="{{ route('cv.show', $cv) }}">Batal</a>
</form>
@endsection
