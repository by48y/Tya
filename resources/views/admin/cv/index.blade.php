@extends('admin.cv.layout')

@section('title', 'Daftar CV')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div><h1 class="h3 mb-1">Daftar CV</h1><p class="text-muted mb-0">Buat lebih dari satu CV dari halaman ini.</p></div>
    <a class="btn btn-primary" href="{{ route('cv.create') }}">+ Buat CV</a>
</div>
<div class="card">
    <div class="card-body">
        @forelse ($cvs as $cv)
            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                <div><h2 class="h5 mb-1">{{ $cv->judul }}</h2><div>{{ $cv->nama }} · {{ $cv->email }}</div></div>
                <div class="d-flex gap-2">
                    <a class="btn btn-sm btn-info" href="{{ route('cv.show', $cv) }}">Lihat</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('cv.edit', $cv) }}">Edit</a>
                    <form method="POST" action="{{ route('cv.destroy', $cv) }}" onsubmit="return confirm('Hapus CV ini?')">
                        @csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="mb-0 text-muted">Belum ada CV.</p>
        @endforelse
    </div>
</div>
@endsection
