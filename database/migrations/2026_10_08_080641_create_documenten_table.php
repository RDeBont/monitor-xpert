<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documenten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrale_id')->constrained('centrales')->cascadeOnDelete();
            $table->string('naam', 150);
            $table->enum('soort', ['handleiding', 'schema', 'overig']);
            $table->string('bestandspad', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documenten');
    }
};