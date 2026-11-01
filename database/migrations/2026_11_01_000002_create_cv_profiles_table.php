<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_profiles_1140', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_1140_id')->unique()->constrained('cv_1140')->cascadeOnDelete();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->text('keahlian')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_profiles_1140');
    }
};
