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
        //Reference table for album, song many-to-many relationship.
        Schema::create('album_song', function (Blueprint $table) {
            $table->bigInteger('album_id')->unsigned();
            $table->bigInteger('song_id')->unsigned();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('song_id')->references('id')->on('songs')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_song');
    }
};
