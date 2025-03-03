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
        Schema::create('order_payments_trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->double('payment_amount')->nullable();
            $table->double('order_amount_balance')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();          
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payments_trackings');
    }
};
