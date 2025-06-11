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
        Schema::create('overview', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('account')->onDelete('restrict')->onUpdate('cascade');
            $table->string('api');
            $table->string('nama');
            $table->string('microcontroller');
            $table->string('roomTemperature');
            $table->string('humidity');
            $table->string('status');
            $table->string('machineTemperature');
            $table->string('manualLamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overview');
    }
};
