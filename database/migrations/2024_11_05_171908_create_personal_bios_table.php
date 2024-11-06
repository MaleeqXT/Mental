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
        Schema::create('personal_bios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Fixed typo and added foreign key constraint
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('credentials');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_bios');
    }
};
