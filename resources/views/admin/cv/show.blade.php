@extends('admin.cv.layout')

@section('title', $cv->judul)
@section('content')
<style>
    .cv-paper { background: #fff; max-width: 1100px; margin: auto; box-shadow: 0 8px 30px #0001; }
    .cv-sidebar { background: #f0dddd; color: #292529; padding: 36px 30px; }
    .cv-main { padding: 52px 55px; }
    .cv-photo { width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border: 10px solid #fff; outline: 3px solid #b98f76; }
    .cv-name { font-size: clamp(42px, 6vw, 78px); line-height: .9; font-weight: 300; letter-spacing: 2px; }
    .cv-surname { font-size: clamp(30px, 4vw, 52px); font-weight: 800; letter-spacing: 4px; }
    .cv-role { letter-spacing: 6px; font-size: 15px; font-weight: 700; border-top: 6px solid #f0dddd; padding-top: 20px; }
    .cv-heading { background: #f0dddd; padding: 8px 14px; font-size: 22px; font-weight: 800; letter-spacing: 1px; margin: 28px 0 18px; }
    .cv-sidebar .cv-heading { background: #fff; text-align: center; }
    .cv-contact { word-break: break-word; }
    .cv-work + .cv-work { margin-top: 22px; }
    .cv-work h3 { font-size: 19px; margin: 0; font-weight: 800; }
    .cv-work .company { font-weight: 700; }
    .cv-work img { max-width: 180px; max-height: 100px; object-fit: cover; margin-top: 8px; }
    @media print {
        body { background: #fff !important; }
        nav, .cv-actions { display: none !important; }
        main.container { max-width: none; padding: 0; }
        .cv-paper { box-shadow: none; }
    }
</style>

<div class="cv-actions d-flex justify-content-between align-items-center mb-3">
    <a class="btn btn-secondary" href="{{ route('cv.index') }}">Kembali</a>
    <div>
        <a class="btn btn-warning" href="{{ route('cv.edit', $cv) }}">Edit CV</a>
        <a class="btn btn-primary" href="{{ route('cv.portfolio.create', $cv) }}">+ Portfolio</a>
    </div>
</div>

<div class="cv-paper row g-0">
    @php($nameParts = preg_split('/\s+/', trim($cv->nama), 2))
    <aside class="cv-sidebar col-md-4">
        @if($cv->profile?->jalur_foto_profil)
            <img class="cv-photo mb-4" src="{{ asset('storage/'.$cv->profile->jalur_foto_profil) }}" alt="{{ $cv->nama }}">
        @else
            <div class="cv-photo mb-4 d-flex align-items-center justify-content-center bg-white">Foto</div>
        @endif

        <h2 class="cv-heading">TENTANG SAYA</h2>
        <p>{{ $cv->ringkasan ?: 'Belum ada ringkasan diri.' }}</p>

        <h2 class="cv-heading">KONTAK</h2>
        <div class="cv-contact">
            <p class="mb-2">☎ {{ $cv->telepon ?: '-' }}</p>
            <p class="mb-2">✉ {{ $cv->email }}</p>
            <p class="mb-2">⌖ {{ $cv->profile?->alamat ?: '-' }}</p>
        </div>

        <h2 class="cv-heading">KEAHLIAN</h2>
        @if($cv->profile?->keahlian)
            <ul>@foreach(preg_split('/\r\n|\r|\n/', $cv->profile->keahlian) as $skill) @if(trim($skill))<li>{{ $skill }}</li>@endif @endforeach</ul>
        @else
            <p>-</p>
        @endif
    </aside>

    <section class="cv-main col-md-8">
        <div class="cv-name">{{ $nameParts[0] }}</div>
        <div class="cv-surname">{{ $nameParts[1] ?? '' }}</div>
        <div class="cv-role">{{ Str::upper($cv->judul) }}</div>

        <h2 class="cv-heading">PORTFOLIO / PENGALAMAN</h2>
        @forelse($cv->portfolios as $portfolio)
            <article class="cv-work">
                <h3>{{ Str::upper($portfolio->judul) }}</h3>
                <div class="company">{{ $cv->nama }}</div>
                @if($portfolio->tampilkan_gambar && $portfolio->jalur_gambar)
                    <img src="{{ asset('storage/'.$portfolio->jalur_gambar) }}" alt="{{ $portfolio->judul }}">
                @endif
                <p class="mt-2 mb-1">{{ $portfolio->deskripsi }}</p>
                @if($portfolio->poin)
                    <ul class="mb-0">@foreach(preg_split('/\r\n|\r|\n/', $portfolio->poin) as $point) @if(trim($point))<li>{{ $point }}</li>@endif @endforeach</ul>
                @endif
                <div class="mt-2">
                    <a class="btn btn-sm btn-outline-warning cv-actions" href="{{ route('cv.portfolio.edit', [$cv, $portfolio]) }}">Edit</a>
                    <form class="d-inline cv-actions" method="POST" action="{{ route('cv.portfolio.destroy', [$cv, $portfolio]) }}" onsubmit="return confirm('Hapus portfolio ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form>
                </div>
            </article>
        @empty
            <p>Belum ada portfolio.</p>
        @endforelse

        <h2 class="cv-heading">PENDIDIKAN</h2>
        <h3 class="h5 fw-bold">{{ $cv->profile?->pendidikan ?: 'Belum diisi' }}</h3>
        <p>{{ $cv->profile?->tanggal_lahir ? 'Tanggal lahir: '.$cv->profile->tanggal_lahir : '' }}</p>
    </section>
</div>
@endsection
