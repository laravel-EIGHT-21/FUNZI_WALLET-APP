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
        Schema::create('studentmedicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id');                                   
            $table->string('student_acct_no')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable(); 
            $table->string('url_path')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('files', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentmedicals');
    }
};
