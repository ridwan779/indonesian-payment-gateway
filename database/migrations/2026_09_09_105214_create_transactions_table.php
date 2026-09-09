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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_channel_id');
            $table->string('order_no')->unique();
            $table->string('name');
            $table->integer('price');
            $table->string('provider_reference_number')->nullable();
            $table->timestamps();

            $table->foreign('payment_channel_id')->references('id')->on('payment_channels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
