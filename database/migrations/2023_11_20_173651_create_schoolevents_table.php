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
        Schema::create('schoolevents', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable(); 
            $table->date('event_date_start')->nullable();
            $table->date('event_date_end')->nullable();
            $table->time('event_time_start')->nullable();
            $table->time('event_time_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolevents');
    }
};
