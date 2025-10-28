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
        Schema::create('user_family_info', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->index(); // Example: KH-0001
            $table->string('name'); // Family member name
            $table->string('relationship')->nullable(); // Relationship (e.g., Father, Mother)
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('phone')->nullable(); // Contact number
            $table->timestamps();

            // Optional foreign key constraint (if user_id references users table)
            // $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_family_info');
    }
};
