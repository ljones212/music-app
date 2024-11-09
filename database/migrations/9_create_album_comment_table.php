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
        Schema::create('album_comment', function (Blueprint $table) {
            $table->bigInteger('album_id')->unsigned();
            $table->bigInteger('comment_id')->unsigned();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')
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
        Schema::dropIfExists('album_comment');
    }
};
