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
            $table->unsignedBigInteger('sportsmonk_id')->index();
            $table->unsignedBigInteger('sport_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->string('nationality_name')->nullable()->index();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('position_name')->nullable();
            $table->unsignedBigInteger('detailed_position_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('common_name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('name')->nullable();
            $table->string('display_name')->nullable()->index();
            $table->string('image_path')->nullable();
            $table->unsignedTinyInteger('height')->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 6)->nullable();
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
