<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cv extends Model
{
    protected $table = 'cv_1140';

    protected $fillable = ['judul', 'nama', 'email', 'telepon', 'ringkasan'];

    public function profile(): HasOne
    {
        return $this->hasOne(CvProfile::class, 'cv_1140_id');
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portofolio1140::class, 'cv_1140_id');
    }
}
