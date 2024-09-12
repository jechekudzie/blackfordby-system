<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // FK to User model
            $table->string('surname');
            $table->string('first_name');
            $table->string('title')->nullable(); // e.g., Dr./Mr./Ms./Miss
            $table->string('previous_name')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('country_of_birth');
            $table->enum('sex', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('id_passport_number');
            $table->string('nationality');
            $table->boolean('permanent_resident')->default(false);
            $table->string('permit_details')->nullable();
            $table->boolean('has_disabilities')->default(false);
            $table->text('disability_details')->nullable();
            $table->boolean('has_criminal_record')->default(false);
            $table->text('criminal_record_details')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
