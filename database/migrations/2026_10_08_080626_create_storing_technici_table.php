<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('storing_technici', function (Blueprint $table) {
            $table->foreignId('storing_id')->constrained('storingen')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->primary(['storing_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('storing_technici');
    }
};