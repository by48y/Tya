<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Portofolio1140;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function create(Cv $cv)
    {
        return view('admin.cv.portfolio-create', compact('cv'));
    }

    public function store(Request $request, Cv $cv)
    {
        $data = $this->validated($request);
        $data['cv_1140_id'] = $cv->id;
        $data['tampilkan_gambar'] = $request->boolean('tampilkan_gambar');
        $data['jalur_gambar'] = $request->hasFile('gambar') ? $request->file('gambar')->store('portfolio', 'public') : null;
        Portofolio1140::create($data);

        return redirect()->route('cv.show', $cv)->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit(Cv $cv, Portofolio1140 $portfolio)
    {
        abort_unless($portfolio->cv_1140_id === $cv->id, 404);
        return view('admin.cv.portfolio-edit', compact('cv', 'portfolio'));
    }

    public function update(Request $request, Cv $cv, Portofolio1140 $portfolio)
    {
        abort_unless($portfolio->cv_1140_id === $cv->id, 404);
        $data = $this->validated($request);
        $data['tampilkan_gambar'] = $request->boolean('tampilkan_gambar');

        if ($request->hasFile('gambar')) {
            if ($portfolio->jalur_gambar) {
                Storage::disk('public')->delete($portfolio->jalur_gambar);
            }
            $data['jalur_gambar'] = $request->file('gambar')->store('portfolio', 'public');
        }

        $portfolio->update($data);
        return redirect()->route('cv.show', $cv)->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Cv $cv, Portofolio1140 $portfolio)
    {
        abort_unless($portfolio->cv_1140_id === $cv->id, 404);
        if ($portfolio->jalur_gambar) {
            Storage::disk('public')->delete($portfolio->jalur_gambar);
        }
        $portfolio->delete();
        return redirect()->route('cv.show', $cv)->with('success', 'Portfolio berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'deskripsi' => ['nullable', 'string'],
            'poin' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
