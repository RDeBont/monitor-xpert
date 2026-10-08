<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klantmelding_berichten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klantmelding_id')->constrained('klantmeldingen')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->text('tekst');
            $table->dateTime('aangemaakt_op')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klantmelding_berichten');
    }
};