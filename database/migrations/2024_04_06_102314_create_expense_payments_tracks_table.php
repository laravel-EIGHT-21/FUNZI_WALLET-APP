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
        Schema::create('expense_payments_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('expense_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('term_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->double('fees_topup_amount')->nullable();
            $table->double('previous_fees_amount')->nullable();
            $table->double('present_fees_amount')->nullable();
            $table->double('old_balance')->nullable();
            $table->double('new_balance')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('expense_payments_tracks');
    }
};
