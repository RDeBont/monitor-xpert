<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grenswaarden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrale_id')->constrained('centrales')->cascadeOnDelete();
            $table->decimal('min_temperatuur', 5, 1);
            $table->decimal('max_temperatuur', 5, 1);
            $table->decimal('min_efficientie', 4, 1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grenswaarden');
    }
};