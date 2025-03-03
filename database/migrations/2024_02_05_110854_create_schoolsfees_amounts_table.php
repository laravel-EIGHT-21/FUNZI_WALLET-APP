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
        Schema::create('schoolsfees_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('rand_no');
            $table->string('school_code');
            $table->integer('school_id');
            $table->integer('term_id');
            $table->string('student_class');
            $table->string('student_day_boarding');
            $table->double('fees_total_amount');
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolsfees_amounts');
    }
};
