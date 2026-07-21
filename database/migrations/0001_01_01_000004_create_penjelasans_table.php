<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('penjelasan', function (Blueprint $table) {
            $table->id();
            $table->text('konten');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjelasan');
    }
};