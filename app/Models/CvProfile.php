<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CvProfile extends Model
{
    protected $table = 'cv_profiles_1140';

    protected $fillable = ['tanggal_lahir', 'jenis_kelamin', 'alamat', 'pendidikan', 'keahlian', 'jalur_foto_profil'];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }
}
