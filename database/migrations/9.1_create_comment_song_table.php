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
        Schema::create('comment_song', function (Blueprint $table) {
            $table->bigInteger('song_id')->unsigned()->nullable();
            $table->bigInteger('comment_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('song_id')->references('id')->on('songs')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('comment_id')->references('id')->on('comments')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_song');
    }
};
