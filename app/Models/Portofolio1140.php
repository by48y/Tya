<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portofolio1140 extends Model
{
    protected $table = 'portofolio_1140';
    protected $fillable = ['cv_1140_id', 'judul', 'deskripsi', 'poin', 'jalur_gambar', 'tampilkan_gambar'];
    protected $casts = ['tampilkan_gambar' => 'boolean'];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class, 'cv_1140_id');
    }
}
