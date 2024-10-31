<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->integer('individual_session_cost')->nullable();
            $table->integer('couple_session_cost')->nullable();
            $table->string('note_on_finances')->nullable();
            $table->string('payment_method_1')->nullable();
            $table->string('payment_method_2')->nullable();
            $table->string('payment_method_3')->nullable();
            $table->string('payment_method_4')->nullable();
            $table->string('insurance')->nullable();
            $table->string('npi_multipractice_carrier')->nullable();
            $table->date('npi_expiration_date')->nullable();
            $table->string('note_on_credentials')->nullable();
            $table->string('mental_health_role')->nullable();
            $table->string('credential_type')->nullable();
            $table->string('license_state')->nullable();
            $table->string('license_number')->nullable();
            $table->date('license_expiration_date')->nullable();
            $table->string('education')->nullable();
            $table->string('degree')->nullable();
            $table->date('started_in')->nullable();
            $table->date('ended_in')->nullable();
            $table->string('additional_degree_1')->nullable();
            $table->string('additional_degree_2')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
