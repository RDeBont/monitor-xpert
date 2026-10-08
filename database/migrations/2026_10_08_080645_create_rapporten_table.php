<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapporten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('titel', 255);
            $table->date('periode_van');
            $table->date('periode_tot');
            $table->dateTime('aangemaakt_op')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapporten');
    }
};