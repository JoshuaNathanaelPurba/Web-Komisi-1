<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bagan_strukturs', function (Blueprint $table) {
            $table->id();
            $table->string('path_foto');
            $table->timestamps();
        });
    }

    // PERBAIKAN 1: Menambahkan fungsi down untuk kebutuhan rollback
    public function down(): void
    {
        Schema::dropIfExists('bagan_strukturs');
    }
};