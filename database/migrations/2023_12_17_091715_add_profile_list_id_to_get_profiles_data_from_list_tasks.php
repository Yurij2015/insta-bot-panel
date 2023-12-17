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
        Schema::table('get_profiles_data_from_list_tasks', static function (Blueprint $table) {
            $table->foreignId('profile_list_id')->after('personal_profile_to_work')->nullable()->references('id')->on('profile_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('get_profiles_data_from_list_tasks', static function (Blueprint $table) {
            $table->dropForeign(['profile_list_id']);
            $table->dropColumn('profile_list_id');
        });
    }
};
