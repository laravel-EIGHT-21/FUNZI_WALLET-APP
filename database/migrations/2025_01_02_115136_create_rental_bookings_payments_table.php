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
        Schema::create('rental_bookings_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('payment_date')->nullable();
            $table->time('sent_time')->nullable();
            $table->string('currency')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('externalId')->nullable();
            $table->string('payer_number')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_bookings_payments');
    }
};
