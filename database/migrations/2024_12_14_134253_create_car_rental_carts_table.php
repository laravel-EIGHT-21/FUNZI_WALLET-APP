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
        Schema::create('car_rental_carts', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('school_id')->nullable();
            $table->BigInteger('car_id')->nullable();
            $table->string('total_days')->nullable();
            $table->string('start_day')->nullable();
            $table->string('end_day')->nullable();
            $table->double('price_per_day')->nullable();
            $table->double('pricetotal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_rental_carts');
    }
};
