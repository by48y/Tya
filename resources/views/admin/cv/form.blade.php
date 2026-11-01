<div class="row g-3">
    <div class="col-md-6"><label class="form-label">Judul CV</label><input class="form-control" name="judul" required value="{{ old('judul', $cv->judul ?? '') }}"></div>
    <div class="col-md-6"><label class="form-label">Nama lengkap</label><input class="form-control" name="nama" required value="{{ old('nama', $cv->nama ?? '') }}"></div>
    <div class="col-md-6"><label class="form-label">Email</label><input type="email" class="form-control" name="email" required value="{{ old('email', $cv->email ?? '') }}"></div>
    <div class="col-md-6"><label class="form-label">Telepon</label><input class="form-control" name="telepon" value="{{ old('telepon', $cv->telepon ?? '') }}"></div>
    <div class="col-md-6"><label class="form-label">Tanggal lahir</label><input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($cv->profile ?? null)->tanggal_lahir) }}"></div>
    <div class="col-md-6"><label class="form-label">Jenis kelamin</label><select class="form-select" name="jenis_kelamin"><option value="">Pilih</option><option @selected(old('jenis_kelamin', optional($cv->profile ?? null)->jenis_kelamin) === 'Laki-laki')>Laki-laki</option><option @selected(old('jenis_kelamin', optional($cv->profile ?? null)->jenis_kelamin) === 'Perempuan')>Perempuan</option></select></div>
    <div class="col-md-6"><label class="form-label">Alamat</label><input class="form-control" name="alamat" value="{{ old('alamat', optional($cv->profile ?? null)->alamat) }}"></div>
    <div class="col-md-6"><label class="form-label">Pendidikan terakhir</label><input class="form-control" name="pendidikan" value="{{ old('pendidikan', optional($cv->profile ?? null)->pendidikan) }}"></div>
    <div class="col-md-6"><label class="form-label">Foto profil</label><input type="file" class="form-control" name="foto_profil" accept="image/*"></div>
    <div class="col-12"><label class="form-label">Ringkasan diri</label><textarea class="form-control" name="ringkasan" rows="3">{{ old('ringkasan', $cv->ringkasan ?? '') }}</textarea></div>
    <div class="col-12"><label class="form-label">Keahlian <small>(satu per baris)</small></label><textarea class="form-control" name="keahlian" rows="3">{{ old('keahlian', optional($cv->profile ?? null)->keahlian) }}</textarea></div>
</div>
