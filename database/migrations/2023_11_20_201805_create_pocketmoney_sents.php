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
        Schema::create('pocketmoney_sents', function (Blueprint $table) {
            $table->id();
            $table->integer('transfer_invoice')->nullable();
            $table->integer('sender_id')->nullable();
            $table->string('school_id')->nullable();
            $table->double('amount_sent')->nullable();
            $table->string('transfer_date')->nullable();
            $table->date('sent_date')->nullable();
            $table->time('sent_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pocketmoney_sents');
    }
};
