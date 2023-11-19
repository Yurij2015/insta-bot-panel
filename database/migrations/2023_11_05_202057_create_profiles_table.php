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
        Schema::create('profiles', static function (Blueprint $table) {
            $table->id();
            $table->string('username', 250);
            $table->string('password', 250);
            $table->text('cookie')->nullable();
            $table->string('token')->nullable()->comment('token for facebook api');
            $table->string('fb_dtsg', 250)->nullable();
            $table->string('user_agent', 250)->nullable();
            $table->foreignId('proxy_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('raw_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
