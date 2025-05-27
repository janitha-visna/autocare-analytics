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
        Schema::create('service_entry_analytics', function (Blueprint $table) {
            $table->id('entry_id'); // Auto-incrementing primary key
            $table->string('vehicle_id');
            $table->date('date');
            $table->integer('year');
            $table->integer('month');
            $table->string('day_of_week');
            $table->integer('total_duration');
            $table->string('category_service');
            $table->string('vehicle_type');
            $table->decimal('amount', 10, 2);
            $table->string('time_of_day');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_entry_analytics');
    }
};
