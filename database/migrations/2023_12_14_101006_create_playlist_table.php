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
        Schema::create('playlist', function (Blueprint $table) {
            $table->id('id_playlist');
            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('cinema_id')->references('id_cinema')->on('cinemas');
            $table->foreign('movie_id')->references('id_movie')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist');
    }
};
