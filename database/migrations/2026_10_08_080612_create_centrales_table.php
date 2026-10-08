<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('centrales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locatie_id')->constrained('locaties');
            $table->string('naam', 100);
            $table->string('adres', 150);
            $table->enum('status', ['actief', 'storing', 'onderhoud', 'buiten_gebruik'])->default('actief');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centrales');
    }
};