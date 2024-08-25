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
        Schema::create('prices', static function (Blueprint $table) {
            $table->id();
            $table->string('stripe_price_id')->unique();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('stripe_product_id');
            $table->string('currency')->default('usd');
            $table->integer('unit_amount');
            $table->json('recurring')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('stripe_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
