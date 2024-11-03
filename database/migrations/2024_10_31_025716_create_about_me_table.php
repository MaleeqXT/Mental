<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (!Schema::hasTable('about_me')) {
        Schema::create('about_me', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession');
            $table->boolean('endorsement_status')->nullable();
            $table->text('personal_statement')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('primary_location')->nullable();
            $table->text('additional_location')->nullable();
            $table->string('availability_description')->nullable();
            $table->string('new_client')->nullable();
            $table->string('online_sessions')->nullable();
            $table->string('intro_call')->nullable();
            $table->string('intro_for_clients')->nullable();
            $table->string('video_intro_desc')->nullable();
            $table->string('video1_url')->nullable();
            $table->string('video2_url')->nullable();
            $table->string('gallery_image_description')->nullable();
            $table->string('image1')->nullable();
            $table->string('identity')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    }

    public function down(): void
    {
        Schema::dropIfExists('about_mes');
    }
};
