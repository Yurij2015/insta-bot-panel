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
        Schema::create('ig_hashtags', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ig_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('media_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ig_hashtags');
    }
};
