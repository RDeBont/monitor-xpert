<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klantmeldingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klanten')->cascadeOnDelete();
            $table->foreignId('centrale_id')->constrained('centrales');
            $table->foreignId('storing_id')->nullable()->constrained('storingen')->nullOnDelete();
            $table->string('meldingnummer', 20)->unique();
            $table->string('type_probleem', 100);
            $table->text('omschrijving');
            $table->enum('status', ['gemeld', 'in_behandeling', 'gepland', 'uitgevoerd', 'in_afwachting', 'opgelost'])->default('gemeld');
            $table->dateTime('gemeld_op');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klantmeldingen');
    }
};