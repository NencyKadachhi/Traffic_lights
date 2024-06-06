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
        Schema::create('traffic_lights', function (Blueprint $table) {
            $table->id();
            $table->integer('light_a');
            $table->integer('light_b');
            $table->integer('light_c');
            $table->integer('light_d');
            $table->integer('green_light_time');
            $table->integer('yellow_light_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_lights');
    }
};
