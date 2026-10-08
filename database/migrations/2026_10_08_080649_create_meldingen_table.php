<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meldingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('tekst', 255);
            $table->dateTime('gelezen_op')->nullable();
            $table->dateTime('aangemaakt_op')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meldingen');
    }
};