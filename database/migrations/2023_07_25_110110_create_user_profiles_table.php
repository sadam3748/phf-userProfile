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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('father_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('cnic')->nullable();
            $table->string('cnic_expiry')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('domicile')->nullable();
            $table->string('city_of_residence')->nullable();
            $table->string('address')->nullable();
            $table->longText('profile_image')->nullable();
            $table->longText('domicile_image')->nullable();
            $table->longText('cnic_front_image')->nullable();
            $table->longText('cnic_back_image')->nullable();
            $table->longText('pnc_certificate_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
