<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        return view('admin.cv.index', ['cvs' => Cv::latest()->get()]);
    }

    public function create()
    {
        return view('admin.cv.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'nama' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'ringkasan' => ['nullable', 'string'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'string', 'max:30'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'pendidikan' => ['nullable', 'string', 'max:255'],
            'keahlian' => ['nullable', 'string'],
            'foto_profil' => ['nullable', 'image', 'max:2048'],
        ]);

        $cv = Cv::create(collect($data)->only(['judul', 'nama', 'email', 'telepon', 'ringkasan'])->all());
        $profile = collect($data)->only(['tanggal_lahir', 'jenis_kelamin', 'alamat', 'pendidikan', 'keahlian'])->all();
        if ($request->hasFile('foto_profil')) {
            $profile['jalur_foto_profil'] = $request->file('foto_profil')->store('profiles', 'public');
        }
        $cv->profile()->create($profile);

        return redirect()->route('cv.show', $cv)->with('success', 'CV berhasil dibuat.');
    }

    public function show(Cv $cv)
    {
        $cv->load(['profile', 'portfolios']);
        return view('admin.cv.show', compact('cv'));
    }

    public function edit(Cv $cv)
    {
        $cv->load('profile');
        return view('admin.cv.edit', compact('cv'));
    }

    public function update(Request $request, Cv $cv)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'nama' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'ringkasan' => ['nullable', 'string'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'string', 'max:30'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'pendidikan' => ['nullable', 'string', 'max:255'],
            'keahlian' => ['nullable', 'string'],
            'foto_profil' => ['nullable', 'image', 'max:2048'],
        ]);

        $cv->update(collect($data)->only(['judul', 'nama', 'email', 'telepon', 'ringkasan'])->all());
        $profile = $cv->profile ?: $cv->profile()->make();
        $profile->fill(collect($data)->only(['tanggal_lahir', 'jenis_kelamin', 'alamat', 'pendidikan', 'keahlian'])->all());
        if ($request->hasFile('foto_profil')) {
            if ($profile->jalur_foto_profil) {
                Storage::disk('public')->delete($profile->jalur_foto_profil);
            }
            $profile->jalur_foto_profil = $request->file('foto_profil')->store('profiles', 'public');
        }
        $cv->profile()->save($profile);

        return redirect()->route('cv.show', $cv)->with('success', 'CV berhasil diperbarui.');
    }

    public function destroy(Cv $cv)
    {
        $cv->delete();
        return redirect()->route('cv.index')->with('success', 'CV berhasil dihapus.');
    }
}
