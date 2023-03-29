<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('status')->default(0); // вкл/выкл ролей
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
