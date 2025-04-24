<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('dvds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('dvdformat_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('location_id');
            $table->string('imageLink');
            $table->string('website');
            $table->string('imdbLink');
            $table->integer('starRating');
            $table->integer('numDisks');
            $table->integer('numEpisode');
            $table->timestamps();

            $table->foreign('dvdformat_id')->references('id')->on('dvdformats');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('dvds');
    }
};