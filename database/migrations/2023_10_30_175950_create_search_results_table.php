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
        Schema::create('search_results', static function (Blueprint $table) {
            $table->id();
            $table->string('key_word')->nullable();
            $table->string('see_more')->nullable();
            $table->string('inform_module')->nullable();
            $table->json('hashtags')->nullable();
            $table->json('places')->nullable();
            $table->json('users')->nullable();
            $table->string('rank_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_results');
    }
};
