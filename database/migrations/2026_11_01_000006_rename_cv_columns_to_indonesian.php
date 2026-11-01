<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv_1140', function (Blueprint $table) {
            if (Schema::hasColumn('cv_1140', 'title')) {
                $table->renameColumn('title', 'judul');
            }
            if (Schema::hasColumn('cv_1140', 'name')) {
                $table->renameColumn('name', 'nama');
            }
            if (Schema::hasColumn('cv_1140', 'phone')) {
                $table->renameColumn('phone', 'telepon');
            }
            if (Schema::hasColumn('cv_1140', 'summary')) {
                $table->renameColumn('summary', 'ringkasan');
            }
        });

        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            if (Schema::hasColumn('cv_profiles_1140', 'cv_id')) {
                $table->renameColumn('cv_id', 'cv_1140_id');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'birth_date')) {
                $table->renameColumn('birth_date', 'tanggal_lahir');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'gender')) {
                $table->renameColumn('gender', 'jenis_kelamin');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'address')) {
                $table->renameColumn('address', 'alamat');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'education')) {
                $table->renameColumn('education', 'pendidikan');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'skills')) {
                $table->renameColumn('skills', 'keahlian');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'profile_image_path')) {
                $table->renameColumn('profile_image_path', 'jalur_foto_profil');
            }
        });

        Schema::table('portofolio_1140', function (Blueprint $table) {
            if (Schema::hasColumn('portofolio_1140', 'cv_id')) {
                $table->renameColumn('cv_id', 'cv_1140_id');
            }
            if (Schema::hasColumn('portofolio_1140', 'title')) {
                $table->renameColumn('title', 'judul');
            }
            if (Schema::hasColumn('portofolio_1140', 'description')) {
                $table->renameColumn('description', 'deskripsi');
            }
            if (Schema::hasColumn('portofolio_1140', 'points')) {
                $table->renameColumn('points', 'poin');
            }
            if (Schema::hasColumn('portofolio_1140', 'image_path')) {
                $table->renameColumn('image_path', 'jalur_gambar');
            }
            if (Schema::hasColumn('portofolio_1140', 'include_image')) {
                $table->renameColumn('include_image', 'tampilkan_gambar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('cv_1140', function (Blueprint $table) {
            if (Schema::hasColumn('cv_1140', 'judul')) {
                $table->renameColumn('judul', 'title');
            }
            if (Schema::hasColumn('cv_1140', 'nama')) {
                $table->renameColumn('nama', 'name');
            }
            if (Schema::hasColumn('cv_1140', 'telepon')) {
                $table->renameColumn('telepon', 'phone');
            }
            if (Schema::hasColumn('cv_1140', 'ringkasan')) {
                $table->renameColumn('ringkasan', 'summary');
            }
        });

        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            if (Schema::hasColumn('cv_profiles_1140', 'cv_1140_id')) {
                $table->renameColumn('cv_1140_id', 'cv_id');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'tanggal_lahir')) {
                $table->renameColumn('tanggal_lahir', 'birth_date');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'jenis_kelamin')) {
                $table->renameColumn('jenis_kelamin', 'gender');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'alamat')) {
                $table->renameColumn('alamat', 'address');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'pendidikan')) {
                $table->renameColumn('pendidikan', 'education');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'keahlian')) {
                $table->renameColumn('keahlian', 'skills');
            }
            if (Schema::hasColumn('cv_profiles_1140', 'jalur_foto_profil')) {
                $table->renameColumn('jalur_foto_profil', 'profile_image_path');
            }
        });

        Schema::table('portofolio_1140', function (Blueprint $table) {
            if (Schema::hasColumn('portofolio_1140', 'cv_1140_id')) {
                $table->renameColumn('cv_1140_id', 'cv_id');
            }
            if (Schema::hasColumn('portofolio_1140', 'judul')) {
                $table->renameColumn('judul', 'title');
            }
            if (Schema::hasColumn('portofolio_1140', 'deskripsi')) {
                $table->renameColumn('deskripsi', 'description');
            }
            if (Schema::hasColumn('portofolio_1140', 'poin')) {
                $table->renameColumn('poin', 'points');
            }
            if (Schema::hasColumn('portofolio_1140', 'jalur_gambar')) {
                $table->renameColumn('jalur_gambar', 'image_path');
            }
            if (Schema::hasColumn('portofolio_1140', 'tampilkan_gambar')) {
                $table->renameColumn('tampilkan_gambar', 'include_image');
            }
        });
    }
};
