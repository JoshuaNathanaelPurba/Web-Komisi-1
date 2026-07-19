<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('renungans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('ayat_alkitab')->nullable();
            $table->text('isi');
            $table->string('foto')->nullable(); // Menyimpan path gambar renungan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('renungans');
    }
};