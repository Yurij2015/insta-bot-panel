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
        Schema::create('liking_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('working_profile_id');
            $table->foreign('working_profile_id')->references('id')->on('profiles');
            $table->json('profiles_list');
            $table->enum('status', ['pending', 'running', 'completed'])->default('pending');
            $table->integer('lower_delay_limit')->default(10000);
            $table->integer('upper_delay_limit')->default(30000);
            $table->integer('count_of_screen_scroll')->default(2);
            $table->integer('lower_limit_of_followers')->nullable()->default(0);
            $table->integer('upper_limit_of_followers')->nullable()->default(0);
            $table->boolean('is_private')->default(false);
            $table->boolean('is_business')->default(false);
            $table->boolean('is_professional')->default(false);
            $table->boolean('has_avatar')->default(false);
            $table->boolean('has_posts')->default(false);
            $table->boolean('has_stories')->default(false);
            $table->boolean('has_url')->default(false);
            $table->boolean('has_phone')->default(false);
            $table->boolean('has_business_category_name')->default(false);
            $table->boolean('has_category_name')->default(false);
            $table->string('category_name')->nullable();
            $table->boolean('has_bio')->default(false);
            $table->integer('lower_posts_limit')->nullable()->default(0);
            $table->integer('lower_stories_limit')->nullable()->default(0);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liking_tasks');
    }
};
