<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_1140', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('email');
            $table->string('telepon', 30)->nullable();
            $table->text('ringkasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_1140');
    }
};
