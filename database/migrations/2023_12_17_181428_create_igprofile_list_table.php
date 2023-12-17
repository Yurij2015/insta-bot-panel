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
        Schema::create('igprofile_list', static function (Blueprint $table) {
            $table->unsignedBigInteger('ig_profile_id');
            $table->unsignedBigInteger('list_id');
            $table->foreign('ig_profile_id')->references('id')->on('profile_infos')->onDelete('cascade');
            $table->foreign('list_id')->references('id')->on('profile_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igprofile_list');
    }
};
