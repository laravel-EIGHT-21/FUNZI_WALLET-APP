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
        Schema::create('previousyear_balances', function (Blueprint $table) {
            $table->id();
            $table->string('student_acct_no')->nullable();
            $table->string('school_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->integer('term_id')->nullable();
            $table->double('balance_fees_amount')->nullable();
            $table->string('student_class')->nullable();
            $table->string('student_day_boarding')->nullable();
            $table->string('previous_year')->nullable();
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
        Schema::dropIfExists('previousyear_balances');
    }
};
