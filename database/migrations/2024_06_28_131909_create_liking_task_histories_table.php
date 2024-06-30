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
        Schema::create('liking_task_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('liking_task_id');
            $table->foreign('liking_task_id')->references('id')->on('liking_tasks');
            $table->unsignedBigInteger('working_profile_id');
            $table->foreign('working_profile_id')->references('id')->on('profiles');
            $table->string('working_profile_username');
            $table->string('handled_profile_login');
            $table->integer('count_of_followers');
            $table->integer('count_of_followings');
            $table->integer('count_of_posts');
            $table->integer('count_of_stories');
            $table->string('page_title');
            $table->string('pause_after_scrolling_started');
            $table->string('pause_after_scrolling_finished');
            $table->string('pause_before_liking_started');
            $table->string('pause_before_liking_finished');
            $table->string('profile_post_id');
            $table->string('profile_post_url');
            $table->integer('count_of_likes');
            $table->integer('count_of_comments');
            $table->string('like_button_click_time');
            $table->string('pause_after_liking_started');
            $table->string('pause_after_liking_finished');
            $table->string('pause_after_work_with_profile_started');
            $table->string('pause_after_work_with_profile_finished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liking_task_histories');
    }
};
