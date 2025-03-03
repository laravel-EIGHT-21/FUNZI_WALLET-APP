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
        Schema::create('purchase_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('term_id')->nullable();
            $table->integer('purchase_id')->nullable();
            $table->double('item_qty')->nullable();
            $table->double('unit_price')->nullable(); 
            $table->double('total_price')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('supplier')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_stocks');
    }
};
