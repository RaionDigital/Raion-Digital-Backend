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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->string('main_description');
            $table->string('image');
            $table->string('service_icon1');
            $table->string('service_title1');
            $table->string('service_description1');
            $table->string('service_icon2');
            $table->string('service_title2');
            $table->string('service_description2');
            $table->string('video_title')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
