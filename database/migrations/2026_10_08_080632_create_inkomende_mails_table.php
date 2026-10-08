<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inkomende_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storing_id')->nullable()->constrained('storingen')->nullOnDelete();
            $table->string('afzender', 150);
            $table->string('onderwerp', 255);
            $table->text('tekst');
            $table->enum('status', ['nieuw', 'verwerkt', 'handmatig'])->default('nieuw');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inkomende_mails');
    }
};