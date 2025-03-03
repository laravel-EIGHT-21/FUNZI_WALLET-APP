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
        Schema::create('tour_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id')->unsigned();
            $table->unsignedBigInteger('school_id')->unsigned();
            $table->text('comment');
            $table->string('rating');
            $table->foreign('tour_id')
                    ->references('id')->on('tour_packages')
                    ->onDelete('cascade');

           $table->foreign('school_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->integer('tour_operator_id')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_reviews');
    }
};
