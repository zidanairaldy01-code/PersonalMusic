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
        Schema::create('music_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instagram_username');
            $table->text('notes')->nullable();
            $table->text('quotes')->nullable();
            $table->string('photo_path');
            $table->string('music_path');
            $table->string('song_title')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_cards');
    }
};
