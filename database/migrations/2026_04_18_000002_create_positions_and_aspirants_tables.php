<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('level', ['national', 'county', 'constituency', 'ward']);
            $table->timestamps();
        });

        Schema::create('aspirants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('party');
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();
            $table->foreignId('county_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('constituency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ward_id')->nullable()->constrained()->nullOnDelete();
            $table->text('bio')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->index(['position_id', 'county_id', 'constituency_id', 'ward_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirants');
        Schema::dropIfExists('positions');
    }
};
