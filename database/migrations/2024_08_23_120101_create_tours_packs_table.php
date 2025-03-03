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
        Schema::create('tours_packs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->BigInteger('school_id');
            $table->BigInteger('tour_package_id');
            $table->string('stud_qty');
            $table->double('stud_price');
            $table->double('stud_pricetotal');
            $table->string('adult_qty');
            $table->double('adult_price');
            $table->double('adult_pricetotal');
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours_packs');
    }
};
