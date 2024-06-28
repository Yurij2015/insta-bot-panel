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
        Schema::create('following_task_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('following_task_id');
            $table->foreign('following_task_id')->references('id')->on('following_tasks');
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
            $table->string('pause_before_following_started');
            $table->string('pause_before_following_finished');
            $table->string('following_button_click_time');
            $table->string('pause_after_following_started');
            $table->string('pause_after_following_finished');
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
        Schema::dropIfExists('following_task_histories');
    }
};
