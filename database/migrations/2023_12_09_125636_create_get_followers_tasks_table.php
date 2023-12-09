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
        Schema::create('get_followers_tasks', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('search_result_id');
            $table->string('personal_profile_username');
            $table->string('status')->nullable()->comment('acitve, completed');
            $table->string('task_status')->nullable()->comment('active, running, completed, error');
            $table->dateTime('task_started_at')->nullable();
            $table->dateTime('task_stoped_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_followers_tasks');
    }
};
