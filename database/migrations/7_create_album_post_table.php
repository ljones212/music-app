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
        Schema::create('album_post', function (Blueprint $table) {
            $table->bigInteger('album_id')->unsigned()->nullable();
            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('post_id')->references('id')->on('posts')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_post');
    }
};
