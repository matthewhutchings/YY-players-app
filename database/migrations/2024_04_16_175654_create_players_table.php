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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('last_synced_at')->nullable();
            $table->unsignedBigInteger('sportsmonk_id');
            $table->unsignedBigInteger('sport_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('nationality_id');
            $table->string('nationality_name');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('position_name')->nullable();
            $table->unsignedBigInteger('detailed_position_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('common_name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('name');
            $table->string('display_name');
            $table->string('image_path');
            $table->unsignedTinyInteger('height')->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
