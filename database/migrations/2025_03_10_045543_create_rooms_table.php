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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->enum('room_type', ['Single', 'Double', 'Suite']);
              $table->enum('floor', ['1st', '2nd', '3rd']); // 1st, 2nd, 3rd Floor
            $table->integer('bed_count'); // Number of beds
            $table->enum('view', ['City', 'Garden', 'Sea', 'Pool'])->default('City');
            $table->boolean('has_balcony')->default(false);

            $table->integer('max_occupancy');
            $table->enum('ac_type', ['AC', 'Non-AC']);
            $table->decimal('price', 10, 2);
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
            $table->boolean('availability')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
