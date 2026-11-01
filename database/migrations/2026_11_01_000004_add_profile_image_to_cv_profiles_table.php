<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            $table->string('jalur_foto_profil')->nullable()->after('keahlian');
        });
    }

    public function down(): void
    {
        Schema::table('cv_profiles_1140', function (Blueprint $table) {
            $table->dropColumn('profile_image_path');
        });
    }
};
