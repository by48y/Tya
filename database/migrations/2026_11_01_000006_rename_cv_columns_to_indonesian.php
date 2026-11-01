<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv_1140', function (Blueprint $table) {
            $table->renameColumn('title', 'judul');
            $table->renameColumn('name', 'nama');
            $table->renameColumn('phone', 'telepon');
            $table->renameColumn('summary', 'ringkasan');
        });

        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            $table->renameColumn('cv_id', 'cv_1140_id');
            $table->renameColumn('birth_date', 'tanggal_lahir');
            $table->renameColumn('gender', 'jenis_kelamin');
            $table->renameColumn('address', 'alamat');
            $table->renameColumn('education', 'pendidikan');
            $table->renameColumn('skills', 'keahlian');
            $table->renameColumn('profile_image_path', 'jalur_foto_profil');
        });

        Schema::table('portofolio_1140', function (Blueprint $table) {
            $table->renameColumn('cv_id', 'cv_1140_id');
            $table->renameColumn('title', 'judul');
            $table->renameColumn('description', 'deskripsi');
            $table->renameColumn('points', 'poin');
            $table->renameColumn('image_path', 'jalur_gambar');
            $table->renameColumn('include_image', 'tampilkan_gambar');
        });
    }

    public function down(): void
    {
        Schema::table('cv_1140', function (Blueprint $table) {
            $table->renameColumn('judul', 'title');
            $table->renameColumn('nama', 'name');
            $table->renameColumn('telepon', 'phone');
            $table->renameColumn('ringkasan', 'summary');
        });

        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            $table->renameColumn('cv_1140_id', 'cv_id');
            $table->renameColumn('tanggal_lahir', 'birth_date');
            $table->renameColumn('jenis_kelamin', 'gender');
            $table->renameColumn('alamat', 'address');
            $table->renameColumn('pendidikan', 'education');
            $table->renameColumn('keahlian', 'skills');
            $table->renameColumn('jalur_foto_profil', 'profile_image_path');
        });

        Schema::table('portofolio_1140', function (Blueprint $table) {
            $table->renameColumn('cv_1140_id', 'cv_id');
            $table->renameColumn('judul', 'title');
            $table->renameColumn('deskripsi', 'description');
            $table->renameColumn('poin', 'points');
            $table->renameColumn('jalur_gambar', 'image_path');
            $table->renameColumn('tampilkan_gambar', 'include_image');
        });
    }
};
