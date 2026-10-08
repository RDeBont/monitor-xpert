<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('storing_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storing_id')->constrained('storingen')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('soort', ['status', 'notitie', 'intern']);
            $table->text('tekst');
            $table->dateTime('aangemaakt_op')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('storing_updates');
    }
};