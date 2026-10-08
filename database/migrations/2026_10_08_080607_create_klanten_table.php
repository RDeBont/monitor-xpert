<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klanten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('klantnummer', 20)->unique();
            $table->string('naam', 100);
            $table->string('email', 150);
            $table->string('telefoonnummer', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klanten');
    }
};