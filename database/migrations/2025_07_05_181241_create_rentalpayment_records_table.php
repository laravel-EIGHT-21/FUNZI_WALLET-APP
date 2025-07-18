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
        Schema::create('rentalpayment_records', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->double('amount')->nullable();
            $table->double('total_amount')->nullable();
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
        Schema::dropIfExists('rentalpayment_records');
    }
};
