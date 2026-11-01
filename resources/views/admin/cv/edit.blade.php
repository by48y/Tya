@extends('admin.cv.layout')

@section('title', 'Edit CV')
@section('content')
<h1 class="h3 mb-3">Edit CV</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('cv.update', $cv) }}">
    @csrf @method('PUT')
    @include('admin.cv.form')
    <div class="mt-4"><button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-secondary" href="{{ route('cv.show', $cv) }}">Batal</a></div>
</form>
@endsection
