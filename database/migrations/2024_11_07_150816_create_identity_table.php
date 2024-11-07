<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('identity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->integer('age')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('faith', 50)->nullable();
            $table->tinyInteger('dob_month')->nullable();
            $table->tinyInteger('dob_day')->nullable();
            $table->integer('dob_year')->nullable();
            $table->timestamps();
    
            // Add foreign key constraint to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity');
    }
};
