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
        Schema::create('tours_carts', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('school_id')->nullable();
            $table->BigInteger('tour_package_id')->nullable();
            $table->string('stud_qty')->nullable();
            $table->double('stud_price')->nullable();
            $table->double('stud_pricetotal')->nullable();
            $table->string('adult_qty')->nullable();
            $table->double('adult_price')->nullable();
            $table->double('adult_pricetotal')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours_carts');
    }
};
