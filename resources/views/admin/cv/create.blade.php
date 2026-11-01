@extends('admin.cv.layout')

@section('title', 'Buat CV')
@section('content')
<h1 class="h3 mb-3">Buat CV</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('cv.store') }}">
    @csrf
    @include('admin.cv.form')
    <div class="mt-4"><button class="btn btn-primary">Simpan CV</button> <a class="btn btn-secondary" href="{{ route('cv.index') }}">Batal</a></div>
</form>
@endsection
