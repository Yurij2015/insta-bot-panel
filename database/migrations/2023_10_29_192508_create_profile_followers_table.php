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
        Schema::create('profile_followers', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profile_id')->nullable();
            $table->string('fbid_v2')->nullable();
            $table->string('pk')->nullable();
            $table->string('pk_id')->nullable();
            $table->string('strong_id__')->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('is_private')->nullable();
            $table->boolean('third_party_downloads_enabled')->nullable();
            $table->boolean('has_anonymous_profile_picture')->nullable();
            $table->string('username')->nullable();
            $table->boolean('is_verified')->nullable();
            $table->string('profile_pic_id')->nullable();
            $table->text('profile_pic_url')->nullable();
            $table->json('account_badges')->nullable();
            $table->boolean('is_possible_scammer')->nullable();
            $table->json('is_possible_bad_actor')->nullable();
            $table->bigInteger('latest_reel_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_followers');
    }
};
