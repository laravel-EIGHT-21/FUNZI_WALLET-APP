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
        Schema::create('students_schoolfees_records', function (Blueprint $table) {
            $table->id();

            $table->string('student_acct_no')->nullable();
            $table->string('school_id')->nullable();
            $table->integer('term_id');
            $table->string('student_class');
            $table->string('student_day_boarding');
            $table->double('amount')->nullable();
            $table->double('total_amount')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_schoolfees_records');
    }
};
