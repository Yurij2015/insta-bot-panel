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
        Schema::create('ig_users', static function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->boolean('is_verified')->nullable();
            $table->string('full_name')->nullable();
            $table->string('search_social_context')->nullable();
            $table->integer('unseen_count')->nullable();
            $table->string('pk')->nullable();
            $table->string('live_broadcast_visibility')->nullable();
            $table->string('live_broadcast_id')->nullable();
            $table->integer('latest_reel_media')->nullable();
            $table->integer('seen')->nullable();
            $table->text('profile_pic_url')->nullable();
            $table->boolean('is_unpublished')->nullable();
            $table->string('ig_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ig_users');
    }
};
