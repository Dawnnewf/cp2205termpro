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
        Schema::create('dvd_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dvd_id')->constrained();
            $table->foreignId('genre_id');
            $table->timestamps();

//            $table->foreign('dvd_id')->references('id')->on('dvds');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dvd_genre');
    }
};