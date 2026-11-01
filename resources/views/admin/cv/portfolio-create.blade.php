@extends('admin.cv.layout')

@section('title', 'Tambah Portfolio')
@section('content')
<h1 class="h3 mb-3">Tambah Portfolio: {{ $cv->judul }}</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('cv.portfolio.store', $cv) }}">
    @csrf @include('admin.cv.portfolio-form')
    <button class="btn btn-primary">Simpan Portfolio</button> <a class="btn btn-secondary" href="{{ route('cv.show', $cv) }}">Batal</a>
</form>
@endsection
