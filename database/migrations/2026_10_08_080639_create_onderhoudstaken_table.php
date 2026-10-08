<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('onderhoudstaken', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrale_id')->constrained('centrales');
            $table->foreignId('technicus_id')->constrained('users');
            $table->string('type_taak', 100);
            $table->text('omschrijving')->nullable();
            $table->dateTime('gepland_op');
            $table->decimal('verwachte_duur_uren', 4, 1);
            $table->enum('status', ['gepland', 'in_behandeling', 'afgerond', 'geannuleerd'])->default('gepland');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('onderhoudstaken');
    }
};