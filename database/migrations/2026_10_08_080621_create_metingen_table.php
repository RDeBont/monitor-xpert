<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('metingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrale_id')->constrained('centrales')->cascadeOnDelete();
            $table->dateTime('gemeten_op')->index();
            $table->decimal('zon_kwh', 10, 1);
            $table->decimal('wind_kwh', 10, 1);
            $table->decimal('biomassa_kwh', 10, 1);
            $table->decimal('temperatuur', 5, 1);
            $table->decimal('efficientie', 4, 1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('metingen');
    }
};