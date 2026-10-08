<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klanten')->cascadeOnDelete();
            $table->foreignId('centrale_id')->constrained('centrales');
            $table->string('contractnummer', 20)->unique();
            $table->string('type', 50);
            $table->date('startdatum');
            $table->date('einddatum');
            $table->unsignedInteger('hersteltijd_uren');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracten');
    }
};