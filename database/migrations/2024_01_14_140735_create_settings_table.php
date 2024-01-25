<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', static function (Blueprint $table) {
            $table->id();
//            upper limit of the pause between tasks

            $table->string('lower_limit_task')->nullable()->comment('lower limit of the pause between tasks');
            $table->string('upper_limit_task')->nullable()->comment('upper limit of the pause between tasks');
            $table->string('lower_limit_profile_activity')->nullable()->comment('lower limit of the pause between profile activity');
            $table->string('upper_limit_profile_activity')->nullable()->comment('upper limit of the pause between profile activity');
            $table->string('lower_limit_processed_profiles')->nullable()->comment('lower limit of the pause between processed profiles');
            $table->string('upper_limit_processed_profiles')->nullable()->comment('upper limit of the pause between processed profiles');
            $table->string('lower_limit_operations_number')->nullable()->comment('lower limit of the pause between operations number');
            $table->string('upper_limit_operations_number')->nullable()->comment('upper limit of the pause between operations number');
            $table->string('lower_limit_followers')->nullable()->comment('lower limit of the pause between followers');
            $table->string('upper_limit_followers')->nullable()->comment('upper limit of the pause between followers');
            $table->string('lower_limit_followings')->nullable()->comment('lower limit of the pause between followings');
            $table->string('upper_limit_followings')->nullable()->comment('upper limit of the pause between followings');
            $table->string('lower_limit_likes')->nullable()->comment('lower limit of the pause between likes');
            $table->string('upper_limit_likes')->nullable()->comment('upper limit of the pause between likes');
            $table->string('lower_limit_unfollows')->nullable()->comment('lower limit of the pause between unfollows');
            $table->string('upper_limit_unfollows')->nullable()->comment('upper limit of the pause between unfollows');
            $table->string('lower_limit_comments')->nullable()->comment('lower limit of the pause between comments');
            $table->string('upper_limit_comments')->nullable()->comment('upper limit of the pause between comments');
            $table->string('lower_limit_likes_for_profile')->nullable();
            $table->string('upper_limit_likes_for_profile')->nullable();
            $table->string('lower_limit_unfollows_for_profile')->nullable();
            $table->string('upper_limit_unfollows_for_profile')->nullable();
            $table->string('lower_limit_comments_for_profile')->nullable();
            $table->string('upper_limit_comments_for_profile')->nullable();
            $table->string('lower_limit_follows_for_profile')->nullable();
            $table->string('upper_limit_follows_for_profile')->nullable();
            $table->string('lower_limit_followings_for_profile')->nullable();
            $table->string('upper_limit_followings_for_profile')->nullable();
            $table->string('lower_limit_parsed_accs_for_profile')->nullable();
            $table->string('upper_limit_parsed_accs_for_profile')->nullable();
            $table->string('host_for_browser_work')->nullable()->comment('host for the browser to work');
            $table->json('profiles_for_work')->nullable()->comment('profiles for work');
            $table->string('start_cron_task_time')->nullable();
            $table->string('task_status')->nullable();
            $table->string('current_task')->nullable();
            $table->string('current_profile')->nullable();
            $table->json('task_types_for_profiles')->nullable();
            $table->string('settings_status')->nullable()->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
