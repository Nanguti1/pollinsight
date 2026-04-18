<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('constituencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('county_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();

            $table->unique(['county_id', 'name']);
        });

        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('constituency_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();

            $table->unique(['constituency_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wards');
        Schema::dropIfExists('constituencies');
        Schema::dropIfExists('counties');
    }
};
