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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->string('name');
            $table->string('stream_type');
            $table->integer('stream_id');
            $table->string('stream_icon');
            $table->string('rating');
            $table->integer('rating_5based');
            $table->string('added');
            $table->string('is_adult');
            $table->string('category_id');
            $table->string('container_extension');
            $table->string('custom_sid');
            $table->string('direct_source');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
