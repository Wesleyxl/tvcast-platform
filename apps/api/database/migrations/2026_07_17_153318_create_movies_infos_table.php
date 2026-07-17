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
        Schema::create('movies_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stream_id')->unique();
            $table->string('kinopoisk_url')->nullable();
            $table->string('name')->nullable();
            $table->string('o_name')->nullable();
            $table->string('cover_big')->nullable();
            $table->string('movie_image')->nullable();
            $table->date('releasedate')->nullable();
            $table->unsignedInteger('episode_run_time')->default(0);
            $table->string('youtube_trailer')->nullable();
            $table->string('director')->nullable();
            $table->text('actors')->nullable();
            $table->text('cast')->nullable();
            $table->text('description')->nullable();
            $table->text('plot')->nullable();
            $table->string('age')->nullable();
            $table->string('rating_mpaa')->nullable();
            $table->decimal('rating_kinopoisk', 3, 1)->nullable();
            $table->unsignedInteger('rating_count_kinopoisk')->nullable();
            $table->string('country')->nullable();
            $table->string('genre')->nullable();
            $table->json('backdrop_path')->nullable();
            $table->string('tmdb_id')->nullable();
            $table->string('backdrop')->nullable();
            $table->string('rating')->nullable();
            $table->unsignedInteger('duration_secs')->nullable();
            $table->string('duration')->nullable();
            $table->json('video')->nullable();
            $table->json('audio')->nullable();
            $table->unsignedInteger('bitrate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_infos');
    }
};
