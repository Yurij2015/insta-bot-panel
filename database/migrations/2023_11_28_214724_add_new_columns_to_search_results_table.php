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
        Schema::table('search_results', static function (Blueprint $table) {
            $table->string('ig_username')->nullable()->after('id');
            $table->bigInteger('ig_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_results', static function (Blueprint $table) {
            $table->dropColumn('ig_username');
            $table->dropColumn('ig_id');
        });
    }
};
