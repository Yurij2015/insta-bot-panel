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
        Schema::table('ig_hashtags', static function (Blueprint $table) {
            $table->integer('search_result_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ig_hashtags', static function (Blueprint $table) {
            $table->dropColumn('search_result_id');
        });
    }
};
