<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('storingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrale_id')->constrained('centrales');
            $table->foreignId('gemeld_door')->nullable()->constrained('users')->nullOnDelete();
            $table->string('storingnummer', 20)->unique();
            $table->string('melder_email', 150);
            $table->enum('bron', ['technicus', 'klant', 'email', 'sensor']);
            $table->enum('type', ['stroom', 'machine', 'temperatuur', 'overig']);
            $table->string('plek_in_fabriek', 100);
            $table->enum('grootte', ['klein', 'gemiddeld', 'groot']);
            $table->enum('urgentie', ['laag', 'normaal', 'hoog', 'urgent'])->default('normaal');
            $table->enum('status', ['gemeld', 'in_behandeling', 'gepland', 'uitgevoerd', 'in_afwachting', 'opgelost'])->default('gemeld');
            $table->text('omschrijving');
            $table->dateTime('gemeld_op');
            $table->dateTime('opgelost_op')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('storingen');
    }
};