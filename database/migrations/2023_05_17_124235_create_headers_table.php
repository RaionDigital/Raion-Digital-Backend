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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('address')->default('Hasbaya, Main Road, Nabatieh Governorate');
            $table->string('phone_number')->default('+961 76 166 888');
            $table->string('email')->default('info@raiondigital.com');
            $table->string('facebook')->default('https://facebook.com');
            $table->string('instagram')->default('http://instagram.com');
            $table->string('linkedin')->default('https://www.linkedin.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
