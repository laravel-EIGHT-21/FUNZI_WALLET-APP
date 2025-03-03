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
        Schema::create('school_fees_collections', function (Blueprint $table) {
            $table->id();
            $table->string('student_acct_no')->nullable();
            $table->string('school_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('currency')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('externalId')->nullable();
            $table->string('payee_number')->nullable();
            $table->string('status')->nullable();
            $table->time('sent_time')->nullable();
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
        Schema::dropIfExists('school_fees_collections');
    }
};
