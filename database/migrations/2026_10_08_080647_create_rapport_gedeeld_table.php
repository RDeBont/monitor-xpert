<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapport_gedeeld', function (Blueprint $table) {
            $table->foreignId('rapport_id')->constrained('rapporten')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->primary(['rapport_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapport_gedeeld');
    }
};