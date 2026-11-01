<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('cvs')) {
            Schema::rename('cvs', 'cv_1140');
        }

        if (Schema::hasTable('cv_profiles')) {
            Schema::rename('cv_profiles', 'cv_profiles_1140');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('cv_profiles_1140')) {
            Schema::rename('cv_profiles_1140', 'cv_profiles');
        }

        if (Schema::hasTable('cv_1140')) {
            Schema::rename('cv_1140', 'cvs');
        }
    }
};
