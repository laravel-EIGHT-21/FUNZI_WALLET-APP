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
        Schema::create('cash_bank_fees_payments', function (Blueprint $table) {
            $table->id();
            $table->string('student_acct_no')->nullable();
            $table->string('school_id')->nullable();
            $table->integer('term_id')->nullable();
            $table->string('student_class')->nullable();
            $table->string('student_day_boarding')->nullable();
            $table->string('invoice_no')->nullable();
            $table->double('fees_topup_amount')->nullable();
            $table->double('previous_fees_amount')->nullable();
            $table->double('present_fees_amount')->nullable();
            $table->double('old_balance')->nullable();
            $table->double('new_balance')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('notes')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_bank_fees_payments');
    }
};
