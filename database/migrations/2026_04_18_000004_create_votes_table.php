<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained()->cascadeOnDelete();
            $table->foreignId('poll_option_id')->constrained()->cascadeOnDelete();
            $table->string('fingerprint');
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->unique(['poll_id', 'fingerprint']);
            $table->index(['poll_id', 'poll_option_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
