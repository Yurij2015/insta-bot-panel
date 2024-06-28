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
        Schema::create('walking_tasks', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('working_profile_id');
            $table->foreign('working_profile_id')->references('id')->on('profiles');
            $table->json('profiles_list');
            $table->enum('status', ['pending', 'running', 'completed'])->default('pending');
            $table->integer('lower_delay_limit')->default(10000);
            $table->integer('upper_delay_limit')->default(30000);
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
        Schema::table('walking_tasks', static function (Blueprint $table) {
            $table->dropForeign(['working_profile_id']);
            $table->dropColumn('working_profile_id');
        });
        Schema::dropIfExists('walking_tasks');
    }
};
