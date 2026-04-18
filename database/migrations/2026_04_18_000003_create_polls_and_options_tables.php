<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();
            $table->foreignId('county_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('constituency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ward_id')->nullable()->constrained()->nullOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Schema::create('poll_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained()->cascadeOnDelete();
            $table->foreignId('aspirant_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['poll_id', 'aspirant_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('poll_options');
        Schema::dropIfExists('polls');
    }
};
