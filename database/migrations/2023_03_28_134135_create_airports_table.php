<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('iata_code')->nullable();
            $table->string('icao_code')->nullable();
            $table->string('name_rus')->nullable();
            $table->string('name_eng')->nullable();
            $table->string('city_rus')->nullable();
            $table->string('city_eng')->nullable();
            $table->string('gmt_offset')->nullable();
            $table->string('country_rus')->nullable();
            $table->string('country_eng')->nullable();
            $table->string('iso_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('runway_elevation')->nullable();

//            $table->id();
//            $table->string('name')->unique();
//            $table->string('slug')->unique();
//            $table->foreignId('country_id')
//                ->constrained()
//                ->cascadeOnUpdate()
//                ->cascadeOnDelete();
//            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
