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
        Schema::create('user_follower', static function (Blueprint $table) {
            $table->unsignedBigInteger('ig_user_id');
            $table->unsignedBigInteger('profile_follower_id');
            $table->foreign('ig_user_id')->references('id')->on('ig_users')->onDelete('cascade');
            $table->foreign('profile_follower_id')->references('id')->on('profile_followers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_follower');
    }
};
