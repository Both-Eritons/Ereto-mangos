<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('titulo desconhecido');
            $table->enum('type', ['manga', 'manhwa', 'manhua'])
                  ->default('manga');
            $table->string('author')->default('author desconhecido');
            $table->text('sinopse');
            $table->string('cover_image')->default('sem_capa.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
