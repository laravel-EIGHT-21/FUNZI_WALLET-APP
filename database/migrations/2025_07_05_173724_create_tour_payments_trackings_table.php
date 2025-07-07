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
        Schema::create('tour_payments_trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->double('payment_amount')->nullable();
            $table->double('tour_amount_balance')->nullable();
            $table->string('payment_type')->nullable();
             $table->string('payment_note')->nullable();
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
        Schema::dropIfExists('tour_payments_trackings');
    }
};
